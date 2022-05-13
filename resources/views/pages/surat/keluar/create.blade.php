@extends('template.main')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-md col-sm col-lg-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Tambah Data Surat Keluar</h4>
                            <a href="{{ url('/letter') }}" class="btn btn-sm btn-info mb-3">Kembali</a>
                            <form action="{{ url('/letter') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md col-sm col-lg">
                                        <div class="form-group">
                                            <label for="kop">KOP SURAT</label>
                                            <select class="form-control @error('kop') is-invalid @enderror" id="kop"
                                                name="kop" required>
                                                <option value="">Select</option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- Start Header Surat --}}
                                        <div class="row">
                                            <div class="col-md col-sm col-lg">
                                                <div class="form-group">
                                                    <label for="no">No Surat</label>
                                                    <input type="text"
                                                        class="form-control @error('no') is-invalid @enderror" id="no"
                                                        name="no" value="{{ old('no') }}" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="lampiran">Lampiran</label>
                                                    <input type="text"
                                                        class="form-control @error('lampiran') is-invalid @enderror"
                                                        id="lampiran" name="lampiran" value="{{ old('lampiran') }}"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="col-md col-sm col-lg">
                                                <div class="form-group">
                                                    <label for="perihal">Hal</label>
                                                    <input type="text"
                                                        class="form-control @error('perihal') is-invalid @enderror"
                                                        id="perihal" name="perihal" value="{{ old('perihal') }}"
                                                        required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="tujuan">Tujuan</label>
                                                    <input type="text"
                                                        class="form-control @error('tujuan') is-invalid @enderror"
                                                        id="tujuan" name="tujuan" value="{{ old('tujuan') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Header Surat --}}
                                        {{-- Start Header Surat --}}
                                        <div class="row">
                                            <div class="col-md col-sm col-lg">
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal Pelaksanaan</label>
                                                    <input type="date"
                                                        class="form-control @error('tanggal') is-invalid @enderror"
                                                        id="tanggal" name="tanggal" value="{{ old('tanggal') }}"
                                                        required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat">Tempat Pelaksanaan</label>
                                                    <input type="text"
                                                        class="form-control @error('tempat') is-invalid @enderror"
                                                        id="tempat" name="tempat" value="{{ old('tempat') }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md col-sm col-lg">
                                                <div class="form-group">
                                                    <label for="waktu">Waktu Pelaksanaan</label>
                                                    <input type="time"
                                                        class="form-control @error('waktu') is-invalid @enderror" id="waktu"
                                                        name="waktu" value="{{ old('waktu') }}" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat_pembuatan">Tempat Pembuatan Surat</label>
                                                    <input type="text"
                                                        class="form-control @error('tempat_pembuatan') is-invalid @enderror"
                                                        id="tempat_pembuatan" name="tempat_pembuatan"
                                                        value="{{ old('tempat_pembuatan') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Header Surat --}}
                                        <div class="form-group">
                                            <label for="pembukaan">Pembukaan</label>
                                            <textarea id="pembukaan" class="form-control" name="pembukaan" rows="3" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="penutup">Penutup</label>
                                            <textarea id="penutup" class="form-control" name="penutup" rows="3" required></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md col-sm col-lg">
                                                <div class="form-group">
                                                    <label for="nama">Nama Pembuat</label>
                                                    <input type="text"
                                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                        name="nama" value="{{ old('nama') }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md col-sm col-lg">
                                                <div class="form-group">
                                                    <label for="nip">NIP/NIS</label>
                                                    <small class="text-muted">*Jika ada</small>
                                                    <input type="text"
                                                        class="form-control @error('nip') is-invalid @enderror" id="nip"
                                                        name="nip" value="{{ old('nip') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
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
