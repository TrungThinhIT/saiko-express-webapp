@extends('modules_manager.main')
@section('title', 'Lịch sử giao dịch')
@section('css')
    <style>
        .addHover {
            cursor: default !important;
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
                    <table class="table table-striped set-border-radius">
                        <thead>
                            <tr style="color:black;font-weight:900" class="text-center">
                                <td class="unset-border-bottom">STT</td>
                                <td class="unset-border-bottom">Số tiền</td>
                                <td class="unset-border-bottom">Tiền tệ</td>
                                <td class="unset-border-bottom">Loại</td>
                                <td class="unset-border-bottom">Mô tả</td>
                                <td class="unset-border-bottom">Người thực hiện</td>
                            </tr>
                        </thead>
                        <tbody id="history-transactions">
                            @foreach ($data['transactions']['data'] as $key => $value)
                                <tr class="text-center addHover">
                                    <td>{{ $data['transactions']['from']++ }}</td>
                                    <td>{{ number_format($value['amount']) }}</td>
                                    <td>{{ $value['currency_id'] }}</td>
                                    <td>{{ $value['type_id'] }}</td>
                                    <td>{{ $value['description'] }}</td>
                                    <td>{{ $value['prepared_by_id'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination custom-paginate" style="float:right">
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
            // $("#fix-stt").DataTable();
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
            $(document).on('click', '.pagination .transaction', function(event) {
                event.preventDefault();
                var page = $(this).attr('data-page');
                fetch_data_transaction(page)
            });
        })

        function fetch_data_transaction(page) {
            $.ajax({
                type: "GET",
                url: "{{ route('transaction.index') }}",
                data: {
                    transaction: true,
                    page_transaction: page
                },
                success: function(data) {
                    if (data.code == 401) {
                        location.reload()
                    } else {
                        if (data.transactions.data.length) {
                            $("#history-transactions").empty()
                            $.each(data.transactions.data, function(index, value) {

                                $("#history-transactions").append(
                                    '<tr class="text-center">' +
                                    '<td>' + data.transactions.from++ + '</td>' +
                                    '<td>' + formatNumber(value.amount) + '</td>' +
                                    '<td>' + value.currency_id +
                                    '<td>' + value.type_id + '</td>' +
                                    '<td>' + value.description + '</td>' +
                                    '<td>' + value.prepared_by_id + '</td>' +
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
