$(document).ready(function ()
{
    $('#EspecForm').validate({
        rules: {
            "txt_especialidade": {
                required: true,
                somenteLetras: true,
                minlength: 4
            }
        },
        messages: {
        	"txt_especialidade": {
        		required: "Preencha este campo",
        		somenteLetras:"Deve conter apenas letras",
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