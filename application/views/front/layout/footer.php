<!-- Load javascript Jquery -->
<script src="<?php echo base_url() ?>assets/template/front/vendor/jquery/jquery-3.2.1.slim.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/front/vendor/popper/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/front/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/front/vendor/date-time-picker-bootstrap-4/js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/template/front/vendor/offcanvas/offcanvas.js" type="text/javascript"></script>

<!-- Color Picker JS -->


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


</body>

</html>