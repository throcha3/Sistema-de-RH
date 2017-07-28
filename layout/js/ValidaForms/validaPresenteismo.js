$(document).ready(function ()
{
    $('#PresenteismoForm').validate({
        rules: {
            "txt_problema": {
                required: true,
                minlength: 4,
            },
            "txt_obs": {
                required : true,
            },
            "date_nasc2": {
                required: true,
                minlength:8,
            },
            "slc_funcionario": {
                required: true,
            },
            "slc_enfermeiro": {
                required: true,
            },
            "date_nasc2": {
                required: true,
            }
        },
        messages: {
        	"txt_problema": {
        		required: "Preencha este campo",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
        	},
            "txt_obs": {
                required: "Preencha este campo",
            },
            "date_nasc2": {
                required: "Preencha este campo",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
            },
            "slc_funcionario": {
                required: "Preencha este campo",
            },
            "slc_enfermeiro": {
                required: "Preencha este campo",
            },
            "date_nasc2": {
                required: "Preencha este campo",
            }

        },
        errorLabelContainer: '.errorTxt',
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        },
    });
});