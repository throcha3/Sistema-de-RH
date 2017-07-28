$(document).ready(function ()
{
    $('#EnfermeiroForm').validate({
        rules: {
            "txt_nome": {
                required: true,
                somenteLetras: true,
            },
            "txt_sobrenome": {
                required: true,
                somenteLetras: true,
            },
            "txt_coren": {
                required: true,
                minlength: 4,
                somenteNumeros: true
            },
            "slc_campus": {
                required: true,
            }
        },
        messages: {
        	"txt_nome": {
        		required: "Preencha este campo",
        		somenteLetras: "Deve conter apenas letras",
        	},
            "txt_sobrenome": {
                required: "Preencha este campo",
                somenteLetras: "Deve conter apenas letras",
            },
            "txt_coren": {
                required: "Preencha este campo",
                somenteNumeros: "Deve conter apenas números",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
            },
            "slc_campus": {
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