$(document).ready(function () {

    /*
     * Validation before send the form
     */

    var $converterForm = $("#converterForm"),
        $successMsg = $(".alert");

    $converterForm.validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            file: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Email field is required",
                email: "Your email address must be in the format of name@domain.com"
            },
            file: {
                required: "File field is required"
            }
        },
        submitHandler: function (form) {

            var _formData = new FormData(form);

            $.ajax({
                url: 'send-converter.php',
                method: 'POST',
                dataType: 'json',
                data: _formData,
                processData: false,
                contentType: false,
                success: function (resp, textStatus, jqXHR) {
                    var msg = resp.message;
                    msg += ' <a href="/uploads/excel-files/' + resp.data.filename + '">Click here</a> to download the file.';

                    $successMsg.find(".success-msg").html(msg);
                    $successMsg.fadeIn();

                    $(form)[0].reset();
                },
                error: function (resp, textStatus, errorThrown) {

                }
            });
        }
    });


});