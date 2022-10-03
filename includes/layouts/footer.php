</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="<?php echo baseUrl ?>/assets/js/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $("#datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });

        //form validate
        $("#formSubmit").validate({
            errorPlacement: function(error, element) {
                if (element.attr("type") == "radio") {
                    error.insertAfter("#errorRadio");
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 2
                },
                gender: {
                    required: true,

                },
                datepicker: {
                    required: true,
                    date: true
                },
                specialist: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                contactNumber: {
                    required: true,
                    number: true
                }
            },
        });

        <?php if(isset($status) and $status == true) { ?>
        toastr.success('Berhasil!', 'Success')
        <?php }?>

        <?php if(isset($status) and $status == false) { ?>
        toastr.error('Failed!', 'Error')
        <?php }?>
    });
</script>
</body>

</html>