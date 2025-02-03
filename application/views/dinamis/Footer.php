<footer class="footer">
    ©
    <?= date('Y'); ?>
    Rizky Laundry.
</footer>
</div>
<!-- End Right content here -->
</div>
<!-- END wrapper -->

<!-- jQuery  -->
<script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>js/modernizr.min.js"></script>
<script src="<?= base_url('assets/') ?>js/detect.js"></script>
<script src="<?= base_url('assets/') ?>js/fastclick.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.slimscroll.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.blockUI.js"></script>
<script src="<?= base_url('assets/') ?>js/waves.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.nicescroll.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.scrollTo.min.js"></script>

<script src="<?= base_url('assets/') ?>plugins/skycons/skycons.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/raphael/raphael-min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/morris/morris.min.js"></script>

<!-- select2 -->
<script src="<?= base_url('assets/') ?>plugins/select2/select2.min.js" type="text/javascript"></script>

<!-- Plugins js -->
<script src="<?= base_url('assets/') ?>plugins/timepicker/moment.js"></script>
<script src="<?= base_url('assets/') ?>plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
<script src="<?= base_url('assets/') ?>plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
<script src="<?= base_url('assets/') ?>plugins/clockpicker/jquery-clockpicker.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/colorpicker/jquery-asColor.js" type="text/javascript"></script>
<script src="<?= base_url('assets/') ?>plugins/colorpicker/jquery-asGradient.js" type="text/javascript"></script>
<script src="<?= base_url('assets/') ?>plugins/colorpicker/jquery-asColorPicker.min.js" type="text/javascript"></script>

<script src="<?= base_url('assets/') ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

<!-- Required datatable js -->
<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url('assets/') ?>plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/buttons.print.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url('assets/') ?>plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url('assets/') ?>pages/datatables.init.js"></script>

<!-- Plugins Init js -->
<script src="<?= base_url('assets/') ?>pages/form-advanced.js"></script>

<!-- App js -->
<script src="<?= base_url('assets/') ?>js/app.js"></script>

<script>
    /* BEGIN SVG WEATHER ICON */
    if (typeof Skycons !== "undefined") {
        var icons = new Skycons({
                color: "#fff"
            }, {
                resizeClear: true
            }),
            list = [
                "clear-day",
                "clear-night",
                "partly-cloudy-day",
                "partly-cloudy-night",
                "cloudy",
                "rain",
                "sleet",
                "snow",
                "wind",
                "fog",
            ],
            i;

        for (i = list.length; i--;) icons.set(list[i], list[i]);
        icons.play();
    }

    // scroll

    $(document).ready(function() {
        $("#boxscroll").niceScroll({
            cursorborder: "",
            cursorcolor: "#cecece",
            boxzoom: true,
        });
        $("#boxscroll2").niceScroll({
            cursorborder: "",
            cursorcolor: "#cecece",
            boxzoom: true,
        });
    });
</script>

<script>
    function previewFoto() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);
        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }

    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
</body>

</html>