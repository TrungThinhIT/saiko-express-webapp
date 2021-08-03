@extends('modules_manager.main')
@section('title', 'Lịch sử giao dịch')
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

    </style>
@section('content')
    @if (isset($data['transactions']))
        <div class="col-md-12 p-2 fix-overflow">
            <div class="card fix-overflow">
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
                                <select class="form-control fix-select" name="" id="type_transaction">
                                    <option value="all">Tất cả</option>
                                    <option value="deposit">Nộp tiền </option>
                                    <option value="payment-sale">Thanh toán đơn mua hàng </option>
                                    <option value="payment-service">Thanh toán phí dịch vụ </option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Loại tiền</label>

                                <select class="form-control fix-select" name="" id="type_money">
                                    <option value="all">Tất cả</option>
                                    <option value="VND">VND </option>
                                    <option value="JPY">JPY </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 mt-2 ">
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
                                    <td>{{ $value['prepared_by_id'] }}</td>
                                    <td>{{ $value['created_at'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination custom-paginate" style="float:right" id="fix-paginate-transaction">
                                <li class="page-item">
                                    <a class="page-link transaction" href="#" aria-label="Previous" data-page="1">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $data['transactions']['last_page']; $i++)
                                    <li class="page-item"><a class="page-link transaction" href="javascript:;"
                                            data-page="{{ $i }}">{{ $i }}</a></li>
                                @endfor
                                <li class="page-item">
                                    <a class="page-link transaction" href="#" aria-label="Next"
                                        data-page={{ $data['transactions']['last_page'] }}>
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
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

            // $('#fix-paginate-transaction').pagination({
            //     total: "{{ $data['transactions']['total'] }}",
            //     length: "{{ $data['transactions']['per_page'] }}",
            //     current: 1,
            //     size: 2,
            //     prev: "&lt;",
            //     next: "&gt;",
            //     click: function(e, current) {
            //         var type_transaction = $("#type_transaction").val();
            //         var type_money = $("#type_money").val();
            //         findByField(type_transaction, type_money)
            //     }
            // });

            // $(document).on('click', '.pagination .transaction', function(event) {
            //     event.preventDefault();
            //     var page = $(this).attr('data-page');
            //     fetch_data_transaction(page)
            // });


            $("#filter").click(function() {
                var type_transaction = $("#type_transaction").val();
                var type_money = $("#type_money").val();
                findByField(type_transaction, type_money)
            })
        })

        function findByField(type_transaction, type_money) {
            $.ajax({
                type: "GET",
                url: "{{ route('transaction.index') }}",
                data: {
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

                                $("#history-transactions").append(
                                    '<tr class="text-center addHover">' +
                                    '<td>' + data.transactions.from++ + '</td>' +
                                    '<td>' + formatNumber(value.amount) + '</td>' +
                                    '<td>' + value.currency_id +
                                    '<td>' + value.type.name + '</td>' +
                                    '<td>' + value.description + '</td>' +
                                    '<td>' + value.prepared_by_id + '</td>' +
                                    '<td>' + value.created_at + '</td>' +
                                    '</tr>'
                                )
                            })
                            $("#fix-paginate-transaction").append(
                                '<li class="page-item">' +
                                '<a class="page-link transaction" href="#" aria-label="Previous" data-page="1">' +
                                '<span aria-hidden="true">&laquo;</span>' +
                                '</a>' +
                                '</li>'
                            )
                            for (var first_page = 1; first_page <= data.transactions.last_page; first_page++) {
                                $("#fix-paginate-transaction").append(
                                    '<li class="page-item"><a class="page-link transaction" href="javascript:;"' +
                                    'data-page="' + first_page + '">' + first_page + '</a></li>'
                                )
                            }
                            $("#fix-paginate-transaction").append(
                                '<li class="page-item">' +
                                '<a class="page-link transaction" href="#" aria-label="Previous" data-page="' +
                                data.transactions.last_page + '">' +
                                '<span aria-hidden="true">&raquo;</span>' +
                                '</a>' +
                                '</li>'
                            )
                        }
                    }

                },
                error: function(response) {

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

                                $("#history-transactions").append(
                                    '<tr class="text-center addHover">' +
                                    '<td>' + data.transactions.from++ + '</td>' +
                                    '<td>' + formatNumber(value.amount) + '</td>' +
                                    '<td>' + value.currency_id +
                                    '<td>' + value.type.name + '</td>' +
                                    '<td>' + value.description + '</td>' +
                                    '<td>' + value.prepared_by_id + '</td>' +
                                    '<td>' + value.created_at + '</td>' +
                                    '</tr>'
                                )
                            })
                        }
                        // $("#fix-paginate-transaction").append(
                        //     '<li class="page-item">' +
                        //     '<a class="page-link transaction" href="#" aria-label="Previous" data-page="1">' +
                        //     '<span aria-hidden="true">&laquo;</span>' +
                        //     '</a>' +
                        //     '</li>'
                        // )
                        // for (var first_page = 1; first_page <= data.transactions.last_page; first_page++) {
                        //     $("#fix-paginate-transaction").append(
                        //         '<li class="page-item"><a class="page-link transaction" href="javascript:;"' +
                        //         'data-page="' + first_page + '">' + first_page + '</a></li>'
                        //     )
                        // }
                        // $("#fix-paginate-transaction").append(
                        //     '<li class="page-item">' +
                        //     '<a class="page-link transaction" href="#" aria-label="Previous" data-page="' +
                        //     data.transactions.last_page + '">' +
                        //     '<span aria-hidden="true">&raquo;</span>' +
                        //     '</a>' +
                        //     '</li>'
                        // )
                    }

                },
                error: function(response) {

                }
            })
        }

    </script>
@endsection
