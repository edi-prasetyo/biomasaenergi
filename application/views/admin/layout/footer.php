</div>
</div>
</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('assets/template/web/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/web/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url('assets/template/web/vendor/autocomplete/jquery-ui.js'); ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $("#startDate").datepicker({
                dateFormat: 'yy-mm-dd'
            });
            $("#endDate").datepicker({
                dateFormat: 'yy-mm-dd'
            }).bind("change", function() {
                var minValue = $(this).val();
                minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
                minValue.setDate(minValue.getDate() + 1);
                $("#to").datepicker("option", "minDate", minValue);
            })
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {

        $('#company').autocomplete({
            source: "<?php echo base_url('admin/customer/get_autocomplete'); ?>",

            select: function(event, ui) {
                $('[name="company"]').val(ui.item.label);
                $('[name="phone"]').val(ui.item.phone);
                $('[name="address"]').val(ui.item.address);
                $('[name="fullname"]').val(ui.item.fullname);
                $('[name="customer_id"]').val(ui.item.id);
                $('[name="email"]').val(ui.item.email);
                $('[name="whatsapp"]').val(ui.item.whatsapp);
                $('[name="city_name"]').val(ui.item.city_name);
                $('[name="province_name"]').val(ui.item.province_name);
                $('[name="postal_code"]').val(ui.item.postal_code);
            }
        });

    });
</script>




<!--Menu Toggle Script-->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<!--SUMMERNOTE-->
<link href="<?php echo base_url('assets/template/web/vendor/summernote/summernote-lite.min.css'); ?> " rel="stylesheet">
<script src="<?php echo base_url('assets/template/web/vendor/summernote/summernote-lite.min.js'); ?>"></script>
<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 130,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    $('#summernote2').summernote({
        tabsize: 2,
        height: 130,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>


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