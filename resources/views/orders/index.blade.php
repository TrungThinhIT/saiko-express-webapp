@extends('modules_manager.main')
@section('title', 'Danh sách đơn hàng')
@section('css')
    <style>
        #create-order {
            color: #484848 !important;
        }

    </style>
@section('content')
    <div class="col-md-12 p-2 fix-overflow">
        <div class="card fix-overflow">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Danh sách đơn hàng</h3>
                    </div>
                </div>
            </div>
            <div class="card-body custom-background set-overflow">
                <table class="table table-striped set-border-radius">
                    <thead>
                        <tr style="color:black;font-weight:900" class="text-center">
                            <td class="unset-border-bottom">STT</td>
                            <td class="unset-border-bottom">Mã đơn</td>
                            <td class="unset-border-bottom">Trạng thái</td>
                            <td class="unset-border-bottom">Tracking</td>
                            <td class="unset-border-bottom">PTVC</td>
                            <td class="unset-border-bottom">Ghi chú</td>
                            <td class="unset-border-bottom">Ngày tạo</td>
                            <td class="unset-border-bottom">Ngày cập nhật</td>

                        </tr>
                    </thead>
                    <tbody id="list-orders">
                        @if (isset($data['list_orders']))
                            @foreach ($data['list_orders']['data'] as $key => $value)
                                <tr class="text-center" data-id=$val>
                                    <td>{{ $data['list_orders']['from']++ }}</td>
                                    <td>{{ $value['id'] }}</td>
                                    <td>{{ $value['status']['name'] }}</td>
                                    <td>{{ $value['trackings'][0]['id'] }}</td>
                                    <td>{{ $value['shipment_method_id'] }}</td>
                                    <td>{{ $value['note'] }}</td>
                                    <td>{{ $value['created_at'] }}</td>
                                    <td>{{ $value['updated_at'] }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination custom-paginate" style="float:right">
                            <li class="page-item">
                                <a class="page-link orders" href="#" aria-label="Previous" data-page="1">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            @for ($i = 1; $i <= $data['list_orders']['last_page']; $i++)
                                <li class="page-item"><a class="page-link orders" href="javascript:;"
                                        data-page="{{ $i }}">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item">
                                <a class="page-link orders" href="#" aria-label="Next"
                                    data-page="{{ $data['list_orders']['last_page'] }}">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#ui-basic').addClass('show');
            $('#index-order').addClass('active')
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
            $(document).on('click', '.pagination .orders', function(event) {
                event.preventDefault();
                var page = $(this).attr('data-page');
                fetch_data_order(page);
            });
        })
        //function

        function fetch_data_order(page) {
            $.ajax({
                type: "GET",
                url: "{{ route('orders.index') }}",
                data: {
                    orders: true,
                    page_order: page
                },
                success: function(data) {
                    if (data == 401) {
                        location.reload()
                    } else {
                        if (data.list_orders.data.length) {
                            $("#list-orders").empty()
                            $.each(data.list_orders.data, function(index, value) {
                                if (value.note == null) {
                                    var note = "";
                                } else {
                                    note = value.note
                                }
                                $("#list-orders").append(
                                    '<tr class="text-center" id=order-' + value.id + '>' +
                                    '<td>' + data.list_orders.from++ + '</td>' +
                                    '<td>' + value.id + '</td>' +
                                    '<td>' + value.status.id + '</td>' +
                                    '<td>' + value.trackings[0].id + '</td>' +
                                    '<td>' + value.shipment_method_id + '</td>' +
                                    '<td>' + note + '</td>' +
                                    '<td>' + value.created_at + '</td>' +
                                    '<td>' + value.updated_at + '</td>' +
                                    '</tr>'
                                )
                            })

                            $("#fix-paginate-order").empty()
                            $("#fix-paginate-order").append(
                                '<li class="page-item">' +
                                '<a class="page-link order" href="#" aria-label="Previous" data-page="1">' +
                                '<span aria-hidden="true">&laquo;</span>' +
                                '</a>' +
                                '</li>'
                            )
                            for (var first_page = 1; first_page <= data.list_orders
                                .last_page; first_page++) {
                                $("#fix-paginate-order").append(
                                    '<li class="page-item"><a class="page-link order" href="javascript:;"' +
                                    'data-page="' + first_page + '">' + first_page + '</a></li>'
                                )
                            }
                            $("#fix-paginate-order").append(
                                '<li class="page-item">' +
                                '<a class="page-link order" href="#" aria-label="Previous" data-page="' +
                                data.list_orders
                                .last_page + '">' +
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

    </script>
@endsection
