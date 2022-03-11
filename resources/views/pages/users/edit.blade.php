@extends('template.main')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Edit Data Pengguna</h4>
                            <a href="{{ url('/user') }}" class="btn btn-sm btn-info mb-3">Back</a>
                            @foreach ($data as $item)
                                <form action="{{ url('/user') . '/' . $item->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    id="username" name="username" value="{{ $item->username }}"
                                                    required />
                                            </div>
                                            <div class="form-group">
                                                <label for="fullname">Nama Lengkap</label>
                                                <input type="text"
                                                    class="form-control @error('fullname') is-invalid @enderror"
                                                    id="fullname" name="fullname" value="{{ $item->fullname }}"
                                                    required />
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    name="email" value="{{ $item->email }}" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" />
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                    id="jenis_kelamin" name="jenis_kelamin">
                                                    <option value="">Select</option>
                                                    <option value="1"
                                                        {{ $item->user_detail->jenis_kelamin == 1 ? 'selected' : '' }}>
                                                        Laki - Laki</option>
                                                    <option value="2"
                                                        {{ $item->user_detail->jenis_kelamin == 2 ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="alamat">Alamat Lengkap</label>
                                                <input type="text"
                                                    class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                                    name="alamat" value="{{ $item->user_detail->alamat }}" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="no_hp">No Hp</label>
                                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                                    id="no_hp" name="no_hp" value="{{ $item->user_detail->no_hp }}"
                                                    required />
                                            </div>
                                            <div class="form-group">
                                                <label for="foto">Profil</label>
                                                <input type="file"
                                                    class="form-control @error('profil') is-invalid @enderror" id="foto"
                                                    name="foto" />
                                            </div>
                                            <div class="form-group">
                                                <label for="lembaga">Lembaga</label>
                                                <select class="form-control" id="lembaga" name="lembaga">
                                                    <option value="">Select</option>
                                                    @foreach ($institution as $val)
                                                        <option value="{{ $val->id }}"
                                                            {{ $item->institution_id == $val->id ? 'selected' : '' }}>
                                                            {{ $val->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatan">Jabatan</label>
                                                <select class="form-control" id="jabatan" name="jabatan">
                                                    <option value="">Select</option>
                                                    @foreach ($position as $val)
                                                        <option value="{{ $val->id }}"
                                                            {{ $item->position_id == $val->id ? 'selected' : '' }}>
                                                            {{ $val->nama_posisi }}
                                                        </option>
                                                    @endforeach
                                                </select>
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
                            @endforeach
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
