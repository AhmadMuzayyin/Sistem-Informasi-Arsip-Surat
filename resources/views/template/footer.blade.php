<!-- Footer -->
<footer class="footer">
    © {{ now()->format('Y') }} Arpas <span class="d-none d-sm-inline-block"> - Crafted with <i
            class="mdi mdi-heart text-danger"></i> by AM Dev</span>.
</footer>

<!-- End Footer -->

<!-- jQuery  -->
<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ url('assets/js/waves.min.js') }}"></script>

<!-- Plugins js -->
<script src="{{ url('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<!--Morris Chart-->
<script src="{{ url('assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ url('assets/plugins/raphael/raphael.min.js') }}"></script>

<script src="{{ url('assets/pages/dashboard.init.js') }}"></script>

<!-- App js -->
<script src="{{ url('assets/js/app.js') }}"></script>
<script src="{{ url('assets/js/taostr.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@stack('script')
</body>

</html>
