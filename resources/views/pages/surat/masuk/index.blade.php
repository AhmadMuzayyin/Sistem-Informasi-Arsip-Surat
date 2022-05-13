@extends('template.main')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Data Surat Masuk</h4>
                            <a href="{{ url('/incomingmail/create') }}" class="btn btn-sm btn-info mb-3">Tambah</a>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-spacing: 0;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Surat</th>
                                            <th>Pengirim</th>
                                            <th>Tujuan</th>
                                            <th>Tanggal Masuk</th>
                                            <th>File</th>
                                            <th><i class="fa fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $item->jenis_surat }}</td>
                                                <td class="text-center">{{ $item->institution->nama }}</td>
                                                <td class="text-center">{{ $item->tujuan }}</td>
                                                <td class="text-center">{{ $item->tanggal_masuk }}</td>
                                                <td class="text-center">
                                                    <img src="{{ asset('storage/uploads') . '/' . $item->file_name }}"
                                                        alt="{{ $item->file_name }}" width="50px" height="50px"
                                                        id="image{{ $item->id }}" class="img"
                                                        data-id="{{ $item->id }}" style="cursor: zoom-in">
                                                </td>
                                                <td class=" text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ url('/incomingmail') . '/' . $item->id . '/edit' }}"
                                                            class="btn btn-sm btn-warning" role="button"><i
                                                                class="fa fa-pencil-alt"></i></a>
                                                        <form action="{{ url('/incomingmail') . '/' . $item->id }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" role="button"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->
@endsection

@push('script')
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
        $(document).ready(function() {
            $('#datatable').DataTable();
            $('.img').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                const viewer = new Viewer(document.getElementById('image' + id), {
                    inline: false,
                    loading: true,
                    fullscreen: false,
                    loop: false,
                    movable: true,
                    navbar: false,
                    rotatable: false,
                    scalable: false,
                    slodeOnTouch: false,
                    title: false,
                    toggleOnDblclick: false,
                    toolbar: false,
                    tooltip: false,
                    zoomOnWheel: false,
                    viewed() {
                        viewer.show();
                    },
                })
            })
        })
        @if (Session::has('success'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif
    </script>
@endpush
