$(document).ready(function ()
{
    $('#SetorForm').validate({
        rules: {
            "txt_setor": {
                required: true,
                minlength: 4
            }
        },
        messages: {
        	"txt_setor": {
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