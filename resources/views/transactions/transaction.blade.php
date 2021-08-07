@extends('modules_manager.main_new')
@section('title', 'Lịch sử giao dịch')
@section('title-header-content', 'Lịch sử giao dịch')
@section('css')
    <style>
        .fh-btn {
            background-color: #fca901 !important;
            color: white !important;
        }

        .addHover {
            cursor: default !important;
        }

        .fix-select {
            color: black !important;
            background-color: white !important;
        }

        #show-account {
            color: #484848;
        }

        #fix-paginate-transaction li.active a {
            border-radius: 50%;
            background-color: #fca901;
            border: unset;
            color: #484848
        }

        #fix-paginate-transaction li a {
            background-color: white;
            color: #484848;
            border: unset;
        }

        #fix-paginate-transaction {
            font-size: 15px;
        }

    </style>
@section('content')
    @if (isset($data['transactions']))
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Lịch sử giao dịch</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body custom-background set-overflow">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Loại giao dịch</label>
                                <select class="form-select" name="" id="type_transaction">
                                    <option value="all">Tất cả</option>
                                    <option value="deposit">Nộp tiền </option>
                                    <option value="payment-sale">Thanh toán đơn mua hàng </option>
                                    <option value="payment-service">Thanh toán phí vận chuyển </option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Loại tiền</label>

                                <select class="form-select" name="" id="type_money">
                                    <option value="all">Tất cả</option>
                                    <option value="VND">VND </option>
                                    <option value="JPY">JPY </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 mt-4 ">
                            <button type="button" class="form-control text-center btn-secondary"
                                id="reset_filter">Reset</button>
                        </div>
                        <div class="col-md-1 mt-4 ">
                            <button type="button" class="form-control text-center fh-btn" id="filter">Lọc</button>
                        </div>

                    </div>
                    <table class="table table-striped set-border-radius">
                        <thead>
                            <tr style="color:black;font-weight:900" class="text-center">
                                <td class="unset-border-bottom">STT</td>
                                <td class="unset-border-bottom">Số tiền</td>
                                <td class="unset-border-bottom">Tiền tệ</td>
                                <td class="unset-border-bottom">Loại</td>
                                <td class="unset-border-bottom">Mô tả</td>
                                <td class="unset-border-bottom">Người thực hiện</td>
                                <td class="unset-border-bottom"> Ngày nhập</td>
                            </tr>
                        </thead>
                        <tbody id="history-transactions">
                            @foreach ($data['transactions']['data'] as $key => $value)
                                <tr class="text-center addHover">
                                    <td>{{ $data['transactions']['from']++ }}</td>
                                    <td>{{ number_format($value['amount']) }}</td>
                                    <td>{{ $value['currency_id'] }}</td>
                                    <td>{{ $value['type']['name'] }}</td>
                                    <td>{{ $value['description'] }}</td>
                                    <td>{{ $value['prepared_by_id'] ? '****************' : '' }}</td>
                                    <td>{{ $value['created_at'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination custom-paginate" style="float:right" id="fix-paginate-transaction">

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        $(document).ready(function() {
            $(document).ajaxStart(function() {
                $("#loader").show();
            });
            $(document).ajaxStop(function() {
                $("#loader").hide();
            });

            $("#exit").click(() => $("#modalConfirmDelete").hide())
            $("#reload").click(() => location.reload());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': "application/json"
                },
            });

            $('#fix-paginate-transaction').pagination({
                total: "{{ $data['transactions']['total'] }}",
                length: "{{ $data['transactions']['per_page'] }}",
                current: 1,
                size: 2,
                prev: "&lt;",
                next: "&gt;",
                click: function(e, current) {
                    var page = $(this)[0].current;
                    var type_transaction = $("#type_transaction").val();
                    var type_money = $("#type_money").val();
                    fetch_data_transaction(page)
                }
            });
            $("#reset_filter").click(function() {
                $("#type_transaction").val('all').change()
                $("#type_money").val('all').change()
            })

            $("#filter").click(function() {
                var type_transaction = $("#type_transaction").val();
                var type_money = $("#type_money").val();
                findByField(type_transaction, type_money)
            })
        })

        function findByField(type_transaction, type_money) {
            $("#fix-paginate-transaction").pagination({
                ajax: function(options, refresh, $target) {
                    var page = $(this)[0].current;
                    $.ajax({
                        type: "GET",
                        url: "{{ route('transaction.index') }}",
                        data: {
                            page_transaction: page,
                            transaction: true,
                            type_transaction: type_transaction,
                            type_money: type_money,
                        },
                        success: function(data) {
                            if (data.code == 401) {
                                location.reload()
                            } else {
                                $("#history-transactions").empty()
                                $("#fix-paginate-transaction").empty()
                                if (data.transactions.data.length) {
                                    $.each(data.transactions.data, function(index, value) {
                                        var name_action = '';
                                        if (value.prepared_by_id) {
                                            name_action = '****************';
                                        }
                                        $("#history-transactions").append(
                                            '<tr class="text-center addHover">' +
                                            '<td>' + data.transactions.from++ +
                                            '</td>' +
                                            '<td>' + formatNumber(value.amount) +
                                            '</td>' +
                                            '<td>' + value.currency_id +
                                            '<td>' + value.type.name + '</td>' +
                                            '<td>' + value.description + '</td>' +
                                            '<td>' + name_action + '</td>' +
                                            '<td>' + value.created_at + '</td>' +
                                            '</tr>'
                                        )
                                    })
                                }
                                refresh({
                                    total: data.transactions.total,
                                    length: data.transactions.per_page
                                });

                            }

                        },
                        error: function(response) {

                        }
                    })
                }
            })
        }

        function fetch_data_transaction(page) {
            var type_transaction = $("#type_transaction").val();
            var type_money = $("#type_money").val();
            $.ajax({
                type: "GET",
                url: "{{ route('transaction.index') }}",
                data: {
                    transaction: true,
                    page_transaction: page,
                    type_transaction: type_transaction,
                    type_money: type_money,
                },
                success: function(data) {
                    if (data.code == 401) {
                        location.reload()
                    } else {
                        $("#history-transactions").empty()
                        // $("#fix-paginate-transaction").empty()
                        if (data.transactions.data.length) {
                            $.each(data.transactions.data, function(index, value) {
                                var name_action = '';
                                if (value.prepared_by_id) {
                                    name_action = '****************';
                                }
                                $("#history-transactions").append(
                                    '<tr class="text-center addHover">' +
                                    '<td>' + data.transactions.from++ + '</td>' +
                                    '<td>' + formatNumber(value.amount) + '</td>' +
                                    '<td>' + value.currency_id +
                                    '<td>' + value.type.name + '</td>' +
                                    '<td>' + value.description + '</td>' +
                                    '<td>' + name_action + '</td>' +
                                    '<td>' + value.created_at + '</td>' +
                                    '</tr>'
                                )
                            })
                        }
                    }

                },
                error: function(response) {

                }
            })
        }

    </script>
@endsection
