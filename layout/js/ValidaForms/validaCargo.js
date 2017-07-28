$(document).ready(function ()
{
   $('#CargoForm').validate({
        rules: {
            "slc_setor": {required: true},
            "txt_cargo": {
                required: true,
                minlength: 4,
            }
        },
        messages: {
          "slc_setor": {required: "Preencha este campo"},
            "txt_cargo": {
                required: "Preencha este campo",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
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