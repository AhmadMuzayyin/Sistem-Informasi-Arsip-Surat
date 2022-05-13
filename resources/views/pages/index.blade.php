@extends('template.main')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Sales Statistics</h4>
                            <ul class="list-inline widget-chart mt-4 mb-0 text-center">
                                <li class="list-inline-item">
                                    <h5>3654</h5>
                                    <p class="text-muted">Marketplace</p>
                                </li>
                                <li class="list-inline-item">
                                    <h5>954</h5>
                                    <p class="text-muted">Last week</p>
                                </li>
                                <li class="list-inline-item">
                                    <h5>8462</h5>
                                    <p class="text-muted">Last Month</p>
                                </li>
                            </ul>
                            <div id="morris-bar-stacked" style="height: 350px;"></div>

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
        });
    </script>
@endpush
