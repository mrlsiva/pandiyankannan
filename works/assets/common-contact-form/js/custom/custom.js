$(document).ready(function() {

    "use strict"; //Start of Use Strict	



    //CONTACT FORM VALIDATION	

    if ($('.form-res').length) {

        $('.form-res').each(function() {

            $(this).validate({

                errorClass: 'error',

                submitHandler: function(form) {

                    $.ajax({

                        type: "POST",

                        url: "assets/common-contact-form/mail/mail.php",

                        data: $(form).serialize(),

                        success: function(data) {

                            if (data) {

                                $(form)[0].reset();

                                $('.sucessMessage').html('Order taken.. will contact you soon...');

                                $('.sucessMessage').show();

                                $('.sucessMessage').delay(3000).fadeOut();

                            } else {

                                $('.failMessage').html(data);

                                $('.failMessage').show();

                                $('.failMessage').delay(3000).fadeOut();

                            }

                        },

                        error: function(XMLHttpRequest, textStatus, errorThrown) {

                            $('.failMessage').html(textStatus);

                            $('.failMessage').show();

                            $('.failMessage').delay(3000).fadeOut();

                        }

                    });

                }

            });

        });

    }



    return false;

    // End of use strict

});