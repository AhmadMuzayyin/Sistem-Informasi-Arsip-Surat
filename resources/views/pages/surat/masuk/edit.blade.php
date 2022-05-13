@extends('template.main')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-md col-sm col-lg-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Tambah Data Surat Masuk</h4>
                            <a href="{{ url('/incomingmail') }}" class="btn btn-sm btn-info mb-3">Kembali</a>
                            <form action="{{ url('/incomingmail') . '/' . $surat->id }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                {{-- Start Header Surat --}}
                                <div class="row">
                                    <div class="col-md col-sm col-lg">
                                        <div class="form-group">
                                            <label for="pengirim">Pengirim</label>
                                            <select class="form-control @error('pengirim') is-invalid @enderror"
                                                id="pengirim" name="pengirim" required>
                                                <option value="">Select</option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $surat->institution_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor">Nomor Surat</label>
                                            <input type="text" class="form-control" name="nomor" id="nomor"
                                                value="{{ $surat->nomor_surat }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="perihal">Perihal</label>
                                            <input type="text" class="form-control" name="perihal" id="perihal"
                                                value="{{ $surat->perihal }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tembusan">Tembusan</label>
                                            <input type="text" class="form-control" name="tembusan" id="tembusan"
                                                value="{{ $surat->tembusan }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_surat">Jenis Surat</label>
                                            <select class="form-control @error('jenis_surat') is-invalid @enderror"
                                                id="jenis_surat" name="jenis_surat" required>
                                                <option value="">Select</option>
                                                <option value="Internal"
                                                    {{ $surat->jenis_surat == 'Internal' ? 'selected' : '' }}>Internal
                                                </option>
                                                <option value="Eksternal"
                                                    {{ $surat->jenis_surat == 'Eksternal' ? 'selected' : '' }}>Eksternal
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md col-sm col-lg">
                                        <div class="form-group">
                                            <label for="tujuan">Tujuan</label>
                                            <input type="text" class="form-control" name="tujuan" id="tujuan"
                                                value="{{ $surat->tujuan }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal Masuk</label>
                                            <input type="date" class="form-control" name="tanggal" id="tanggal"
                                                value="{{ $surat->tanggal_masuk }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lampiran">Lampiran</label>
                                            <input type="text" class="form-control" name="lampiran" id="lampiran"
                                                value="{{ $surat->lampiran ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="cq">C.q.</label>
                                            <input type="text" class="form-control" name="cq" id="cq"
                                                value="{{ $surat->cq ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="file">File Surat</label>
                                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                                id="file" name="file" />
                                        </div>
                                        <div class="form-group mt-5">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> {{-- End Card Body --}}
                    </div> {{-- end card --}}
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
