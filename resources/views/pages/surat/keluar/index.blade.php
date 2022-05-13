@extends('template.main')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Sorry, this content is Coming Soon!</h4>
                            {{-- <h4 class="mt-0 header-title mb-4">Data Surat Keluar</h4> --}}
                            {{-- <a href="{{ url('/letter/create') }}" class="btn btn-sm btn-info mb-3">Tambah</a>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kepemilikan</th>
                                        <th>Hal</th>
                                        <th>Tujuan</th>
                                        <th>Pelaksanaan</th>
                                        <th>Tempat</th>
                                        <th><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->institution->nama }}</td>
                                            <td>{{ $item->perihal }}</td>
                                            <td>{{ $item->tujuan }}</td>
                                            <td>{{ date('d-M-Y', strtotime($item->tgl_pelaksanaan)) }}</td>
                                            <td>{{ $item->tempat_pelaksanaan }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('/print-surat') . '/' . $item->id }}"
                                                        class="btn btn-sm btn-info" role="button"><i
                                                            class="fa fa-print"></i></a>
                                                    <a href="{{ url('/print-surat') . '/' . $item->id . '/edit' }}"
                                                        class="btn btn-sm btn-warning" role="button"><i
                                                            class="fa fa-pencil-alt"></i></a>
                                                    <form action="{{ url('/user') . '/' . $item->id }}" method="POST">
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
                            </table> --}}
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
        $(document).ready(function() {
            $('#datatable').DataTable();
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
