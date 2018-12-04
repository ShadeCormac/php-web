$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            ProductName: {
                validators: {
                    stringLength: {
                        min: 3,
                        message: 'Please enter at least 3 characters'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                }
            },
            Description: {
                validators: {
                    stringLength: {
                        min: 3,
                        message: 'Please enter at least 3 characters'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                }
            },
            ImageSource: {
                validators: {
                    stringLength: {
                        min: 3,
                        message: 'Please enter at least 3 characters'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                }
            },
            // Category: {
            //     validators: {
            //         stringLength: {
            //             min: 3,
            //             message: 'Please enter at least 3 characters'
            //         },
            //         notEmpty: {
            //             message: 'Please supply a description of your project'
            //         }
            //     }
            // },
            Producer: {
                validators: {
                    stringLength: {
                        min: 3,
                        message: 'Please enter at least 3 characters'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                }
            },
            Origin: {
                validators: {
                    stringLength: {
                        min: 3,
                        message: 'Please enter at least 3 characters'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                }
            },
            Price: {
                validators: {
                    stringLength: {
                        min: 3,
                        message: 'Please enter at least 3 characters and must enter the number'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                }
            },
            ViewCount: {
                validators: {
                    stringLength: {
                        min: 3,
                        message: 'Please enter at least 3 characters and must enter the number'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                }
            },
            SellCount: {
                validators: {
                    stringLength: {
                        min: 3,
                        message: 'Please enter at least 3 characters and must enter the number'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                }
            },
            Quantity: {
                validators: {
                      stringLength: {
                        min: 3,
                        message:'Please enter at least 3 characters and must enter the number'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});