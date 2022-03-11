@extends('template.main')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Data Jabatan</h4>
                            <button type="button" class="btn btn-sm btn-info mb-3" data-toggle="modal"
                                data-target="#myModal">Tambah</button>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center"><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->nama_posisi }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-warning editJabatan" role="button"
                                                        data-toggle="modal" data-target="#EditModal"
                                                        data-id="{{ $item->id }}" data-jb="{{ $item->nama_posisi }}">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </button>
                                                    <form action="{{ url('/position') . '/' . $item->id }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" role="button" class="btn btn-sm btn-danger">
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
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->
    @include('pages.jabatan.create')
    @include('pages.jabatan.edit')
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
            $('.editJabatan').click(function(e) {
                e.preventDefault();
                $('#id').val($(this).data('id'));
                $('#jb').val($(this).data('jb'));
            });
        });
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
