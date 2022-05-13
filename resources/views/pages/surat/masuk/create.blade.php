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
                            <form action="{{ url('/incomingmail') }}" method="POST" enctype="multipart/form-data">
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
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor">Nomor Surat</label>
                                            <input type="text" class="form-control  @error('nomor') is-invalid @enderror"
                                                name="nomor" id="nomor" value="{{ old('nomor') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="perihal">Perihal</label>
                                            <input type="text" class="form-control  @error('perihal') is-invalid @enderror"
                                                name="perihal" id="perihal" value="{{ old('perihal') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tembusan">Tembusan</label>
                                            <input type="text" class="form-control" name="tembusan" id="tembusan">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_surat">Jenis Surat</label>
                                            <select class="form-control @error('jenis_surat') is-invalid @enderror"
                                                id="jenis_surat" name="jenis_surat" required>
                                                <option value="">Select</option>
                                                <option value="Internal">Internal</option>
                                                <option value="Eksternal">Eksternal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md col-sm col-lg">
                                        <div class="form-group">
                                            <label for="tujuan">Tujuan</label>
                                            <input type="text" class="form-control  @error('tujuan') is-invalid @enderror"
                                                name="tujuan" id="tujuan" value="{{ old('tujuan') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal Masuk</label>
                                            <input type="date" class="form-control  @error('tanggal') is-invalid @enderror"
                                                name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lampiran">Lampiran</label>
                                            <input type="text" class="form-control" name="lampiran" id="lampiran">
                                        </div>
                                        <div class="form-group">
                                            <label for="cq">C.q.</label>
                                            <input type="text" class="form-control" name="cq" id="cq">
                                        </div>
                                        <div class="form-group">
                                            <label for="file">File Surat</label>
                                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                                id="file" name="file" required />
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
        $(document).ready(function() {
            if ($("#elm1").length > 0) {
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [{
                        title: 'Bold text',
                        inline: 'b'
                    }, {
                        title: 'Red text',
                        inline: 'span',
                        styles: {
                            color: '#ff0000'
                        }
                    }, {
                        title: 'Red header',
                        block: 'h1',
                        styles: {
                            color: '#ff0000'
                        }
                    }, {
                        title: 'Example 1',
                        inline: 'span',
                        classes: 'example1'
                    }, {
                        title: 'Example 2',
                        inline: 'span',
                        classes: 'example2'
                    }, {
                        title: 'Table styles'
                    }, {
                        title: 'Table row 1',
                        selector: 'tr',
                        classes: 'tablerow1'
                    }]
                });
            }
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
