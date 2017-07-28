$(document).ready(function ()
{
    $('#MedicoForm').validate({
        rules: {
            "txt_primeiro_nome": {
                required: true,
                somenteLetras: true,
            },
            "txt_segundo_nome": {
                required: true,
                somenteLetras: true,
            },
            "txt_crm": {
                required: true,
                minlength: 7,
            }
        },
        messages: {
        	"txt_primeiro_nome": {
        		required: "Preencha este campo",
        		somenteLetras: "Deve conter apenas letras",

        	},
            "txt_segundo_nome": {
                required: "Preencha este campo",
                somenteLetras: "Deve conter apenas letras",
            },
            "txt_crm": {
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