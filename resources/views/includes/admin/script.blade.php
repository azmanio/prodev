<!-- Bootstrap core JavaScript-->
<script src="/assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/assets/admin/js/demo/datatables-demo.js"></script>

<!-- Core plugin JavaScript-->
<script src="/assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/assets/admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/assets/admin/js/demo/chart-area-demo.js"></script>
<script src="/assets/admin/js/demo/chart-pie-demo.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        bsCustomFileInput.init()
    })
</script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

@stack('script')
