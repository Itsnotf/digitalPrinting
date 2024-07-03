@extends('layouts.app')

@section('title', 'Kelola Transaksi')
@section('desc', ' Dihalaman ini anda bisa kelola transaksi. ')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>List Transaksi</h4>
            {{-- <div class="card-header-action">
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Tambah
            </a>
        </div> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped w-100" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bukti Pembayaran</th>
                            <th>Pembeli</th>
                            <th>Produk</th>
                            <th>Pembayaran</th>
                            <th>Jumlah</th>
                            <th>Catatan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            var datatable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: "{!! url()->current() !!}"
                },
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'ALL']
                ],
                responsive: true,
                order: [
                    [0, 'desc'],
                ],
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'bukti',
                        name: 'bukti'
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'produk',
                        name: 'produk'
                    },
                    {
                        data: 'pembayaran',
                        name: 'pembayaran'
                    },
                    {
                        data: 'qty',
                        name: 'qty'
                    },
                    {
                        data: 'catatan',
                        name: 'catatan'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    },
                ],
                columnDefs: [{
                    "targets": 1,
                    "render": function(data, type, row, meta) {
                        let img = `assets/img/avatar/avatar-1.png`;
                        if (data) {
                            img = `storage/${data}`;
                        }

                        let fullImgPath = `{{ asset('/') }}${img}`;

                        return `<a href="${fullImgPath}" target="_blank">
                    <img alt="avatar" src="${fullImgPath}" class="" width="35">
                </a>`;
                    }
                }, {
                    "targets": -1,
                    "render": function(data, type, row, meta) {
                        return `
                        <button
                            type="button"
                            class="btn-aksi btn btn-sm btn-danger"
                            data-id="${row.id}"
                        >
                            Belum Selesai
                        </button>
                    `;
                    }
                }],
                rowId: function(a) {
                    return a;
                },
                rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                },
            });

            // Handle button click
            $('#datatable').on('click', '.btn-aksi', function() {
                var button = $(this);
                var transactionId = button.data('id');

                // Change button text and disable it
                button.text('Selesai').removeClass('btn-danger').addClass('btn-success').prop('disabled', true);

                // Optionally, make an AJAX request to update the status in the backend
                $.ajax({
                    url: `/update-status/${transactionId}`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: 'selesai'
                    },
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                    },
                    error: function(xhr) {
                        // Handle error response
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush()
