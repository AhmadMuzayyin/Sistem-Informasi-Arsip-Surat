<!-- Footer -->
<footer class="footer">
    © {{ now()->format('Y') }} SINARSU <span class="d-none d-sm-inline-block"> - Crafted with <i
            class="mdi mdi-heart text-danger"></i> by AM Dev</span>.
</footer>

<!-- End Footer -->

<!-- jQuery  -->
<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ url('assets/js/waves.min.js') }}"></script>
<script src="{{ url('assets/js/viewer.min.js') }}"></script>

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
<script>
    //   apex chart
    var options1 = {
        chart: {
            type: 'area',
            height: 60,
            sparkline: {
                enabled: true
            }
        },
        series: [{
            data: [24, 66, 42, 88, 62, 24, 45, 12, 36, 10]
        }],
        stroke: {
            curve: 'smooth',
            width: 3
        },
        colors: ['#0e86e7'],
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function(seriesName) {
                        return ''
                    }
                }
            },
            marker: {
                show: false
            }
        }
    }
    new ApexCharts(document.querySelector("#chart1"), options1).render();
    // 2
    var options2 = {
        chart: {
            type: 'area',
            height: 60,
            sparkline: {
                enabled: true
            }
        },
        series: [{
            data: [54, 12, 24, 66, 42, 25, 44, 12, 36, 9]
        }],
        stroke: {
            curve: 'smooth',
            width: 3
        },
        colors: ['#fbb131'],
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function(seriesName) {
                        return ''
                    }
                }
            },
            marker: {
                show: false
            }
        }
    }
    new ApexCharts(document.querySelector("#chart2"), options2).render();
    // 3
    var options3 = {
        chart: {
            type: 'area',
            height: 60,
            sparkline: {
                enabled: true
            }
        },
        series: [{
            data: [10, 36, 12, 44, 63, 24, 44, 12, 56, 24]
        }],
        stroke: {
            curve: 'smooth',
            width: 3
        },
        colors: ['#23cbe0'],
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function(seriesName) {
                        return ''
                    }
                }
            },
            marker: {
                show: false
            }
        }
    }
    new ApexCharts(document.querySelector("#chart3"), options3).render();
    //   4
    var options4 = {
        chart: {
            type: 'area',
            height: 60,
            sparkline: {
                enabled: true
            }
        },
        series: [{
            data: [34, 66, 42, 33, 62, 24, 45, 16, 48, 10]
        }],
        stroke: {
            curve: 'smooth',
            width: 3
        },
        colors: ['#fb4365'],
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function(seriesName) {
                        return ''
                    }
                }
            },
            marker: {
                show: false
            }
        }
    }
    new ApexCharts(document.querySelector("#chart4"), options4).render();
</script>
@stack('script')
</body>

</html>
