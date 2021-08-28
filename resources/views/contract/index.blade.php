@extends('modules_manager.main_new')
@section('title', 'Gom hàng theo lô')
@section('title-header-content', 'Gom hàng theo lô')
@section('css')
    <style>
        .fh-btn {
            background-color: #fca901 !important;
            color: white !important;
        }

        #fix-paginate-contracts li.active a {
            border-radius: 50%;
            background-color: #fca901;
            border: unset;
            color: #484848
        }

        #fix-paginate-contracts li a {
            background-color: white;
            color: #484848;
            border: unset;
        }

        #fix-paginate-contracts {
            font-size: 15px;
        }

    </style>
@section('content')
    <div class="col-md-12 fix-overflow">
        <div class="card fix-overflow">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Gom hàng theo lô</h3>
                    </div>
                </div>
            </div>
            <div class="card-body custom-background set-overflow">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="" class="form-select " id="select_search">
                                <option value="all">Tất cả</option>
                                <option value="name_contract">Tên lô</option>
                                <option value="status_contract">Trạng thái</option>
                                <option value="date_contract">Ngày</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="form-group" id="name_contract">
                            <input type="text" class="form-control" id="value_contract">
                        </div>
                        <div class="form-group  d-none" id="select-status-contract">
                            <select name="" id="list-status" class="form-select ">
                                <option value="0">Chưa đóng</option>
                                <option value="1">Đã đóng</option>
                            </select>
                        </div>
                        <div class="row d-none" id="date-contract">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="start_date" placeholder="Ngày bắt đầu">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="end_date" placeholder="Ngày kết thúc">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-secondary form-control text-center "
                            id="reset_contract">reset</button>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn form-control text-center fh-btn" id="filter_contract">Lọc</button>
                    </div>
                </div>
                <table class="table table-striped set-border-radius">
                    <thead>
                        <tr class="text-center" style="color:black;font-weight:900">
                            <td class="unset-border-bottom">Lô</td>
                            <td class="unset-border-bottom">Phí ship đường bay</td>
                            <td class="unset-border-bottom">Phí ship đường biển</td>
                            <td class="unset-border-bottom">Phí dịch vụ</td>
                            <td class="unset-border-bottom">Phí vận chuyển</td>
                            <td class="unset-border-bottom">Trạng thái</td>
                        </tr>
                    </thead>
                    <tbody id="list-contracts">
                        @isset($data['list_contracts'])
                            @foreach ($data['list_contracts']['data'] as $item)
                                <tr class="text-center addHover detail-contract" data-id="{{ $item['id'] }}">
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['price_shipping_fee_air'] ? number_format($item['price_shipping_fee_air']) . ' VND' : '' }}
                                    </td>
                                    <td>{{ $item['price_shipping_fee_sea'] ? number_format($item['price_shipping_fee_sea']) . ' VND' : '' }}
                                    </td>
                                    <td>{{ $item['service_fee'] ? number_format($item['service_fee']) . ' VND' : '' }}</td>
                                    <td>{{ $item['shipping_fee'] ? number_format($item['shipping_fee']) . ' VND' : '' }}</td>
                                    <td>{{ $item['closed'] ? 'Đã đóng' : 'Chưa đóng' }}</td>
                                </tr>
                            @endforeach
                        @endisset

                    </tbody>
                </table>
                <div class="mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination custom-paginate" style="float:right" id="fix-paginate-contracts">

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': "application/json"
                },
            });

            $(document).ajaxStart(function() {
                $("#loader").show();
            });


            $(document).ajaxStop(function() {
                $("#loader").hide();
            });

            $(document).on('click', '.detail-contract', function(event) {
                event.preventDefault();
                let order_id = $(this).data('id');
                window.location.href = "../contracts/" + order_id;
            });

            $('#fix-paginate-contracts').pagination({
                total: "{{ $data['list_contracts']['total'] }}",
                current: 1,
                length: "{{ $data['list_contracts']['per_page'] }}",
                size: 2,
                prev: "&lt;",
                next: "&gt;",
                click: function(e) {
                    var page = $(this)[0].current;
                    fetch_data_contracts(page)
                }
            })

            $("#select_search").change(function() {
                let field_seach = $(this).val();
                $("#start_date").val('')
                $("#end_date").val('')
                $("#value_contract").val('')
                switch (field_seach) {
                    case 'all':
                        $("#select-status-contract").addClass('d-none');
                        $("#date-contract").addClass('d-none');
                        $("#name_contract").removeClass('d-none');
                        break;
                    case 'name_contract':
                        $("#select-status-contract").addClass('d-none');
                        $("#date-contract").addClass('d-none');
                        $("#name_contract").removeClass('d-none');
                        break;
                    case 'status_contract':
                        $("#date-contract").addClass('d-none');
                        $("#name_contract").addClass('d-none');
                        $("#select-status-contract").removeClass('d-none');
                        break;
                    case 'date_contract':
                        $("#select-status-contract").addClass('d-none');
                        $("#name_contract").addClass('d-none');
                        $("#date-contract").removeClass('d-none');
                        break;

                    default:
                        break;
                }
            })
            $(function() {
                $("#start_date").datepicker({
                    format: 'dd-mm-yyyy',
                })
                $("#end_date").datepicker({
                    format: 'dd-mm-yyyy',
                })
            })
        })

        function fetch_data_contracts(page) {
            $.ajax({
                type: 'GET',
                url: "{{ route('contract.index') }}",
                data: {
                    page: page
                },
                success: function(respone) {
                    console.log(respone)
                    checkStatus(respone.code)
                    $("#list-contracts").empty();
                    if (respone.list_contracts.data.length) {
                        $.each(respone.list_contracts.data, function(index, value) {
                            $("#list-contracts").append(
                                `<tr class="text-center addHover detail-contract" data-id="${value.id}">` +
                                `<td>${value.id}</td>` +
                                `<td>` +
                                `${value.price_shipping_fee_air?formatNumber(value.price_shipping_fee_air) + ' VND':''}` +
                                `</td>` +
                                '<td>' +
                                `${value.price_shipping_fee_sea?formatNumber(value.price_shipping_fee_sea) + ' VND':''}` +
                                '</td>' +
                                '<td>' +
                                `${value.service_fee?formatNumber(value.service_fee) + ' VND':''}` +
                                '</td>' +
                                '<td>' +
                                `${value.shipping_fee?formatNumber(value.shipping_fee)+ ' VND':''}` +
                                '</td>' +
                                '<td>' + `${value.closed?'Đã đóng':'Chưa đóng'}` + '</td>' +
                                '</tr>'
                            )
                        })
                    }
                },
                error: function(respone) {
                    if (respone.status == 419) {
                        window.location.reload()
                    } else {
                        console.log(respone)
                    }
                }
            })
        }

        function checkStatus(code) {
            switch (code) {
                case 401:
                    window.location.reload()
                    break;
            }
        }

    </script>
@endsection
