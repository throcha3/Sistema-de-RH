$(document).ready(function () 
{
    $('#FuncionarioForm').validate({
        rules: {
            "txt_pront": {
                required: true,
                somenteNumeros: true,
                minlength: 9,
            },
            "txt_cpf": {
                required: true,
                minlength: 11,
            },
            "txt_nome": {
                required: true,
                somenteLetras: true,
            },
            "txt_sobrenome": {
                required: true,
                somenteLetras: true,
            },
            "date_nasc2": {
                required: true,
                somenteNumeros: true,
                minlength: 8,
            }
        },
        messages: {
        	"txt_pront": {
        		required: "Preencha este campo",
        		somenteNumeros: "Deve conter apenas números",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
        	},
            "txt_cpf": {
                required: "Preencha este campo",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
            },
            "txt_nome": {
                required: "Preencha este campo",
                somenteLetras: "Deve conter apenas letras",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
            },
            "txt_sobrenome": {
                required: "Preencha este campo",
                somenteLetras: "Deve conter apenas letras",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
            },
            "slc_campus": {
                required: "Selecione uma opção",
            },
            "slc_sexo": {
                required: "Selecione uma opção",
            },
            "slc_cargo": {
                required: "Selecione uma opção",
            },
            "slc_setor": {
                required: "Selecione uma opção",
            },

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