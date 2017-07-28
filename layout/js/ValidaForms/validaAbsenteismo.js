$(document).ready(function ()
{
    $('#AbsenteismoForm').validate({
        rules: {
            "txt_cid": {
                required: true,
                somenteLetras: true,
                minlength: 4,
            },
            "txt_data_i": {
                minlength: 8,
                somenteNumeros: true,
                required: $("#txt_tipo_doc").val() == "atestado"
            },
            "slc_cid": {
                required: true,
            },
            "txt_data_f": {
                minlength: 8,
                somenteNumeros: true,
                required: function(element) {
                    return $("#txt_tipo_doc").val() == "atestado";
                }
            },
            "txt_data_ini": {
                minlength: 8,
                somenteNumeros: true,
                required: function(element) {
                    return $("#txt_tipo_doc").val() == "declaracao";
                }
            },
            "txt_hora_i": {
                minlength: 4,
                somenteNumeros: true,
                required: function(element) {
                    return $("#txt_tipo_doc").val() == "declaracao";
                }
            },
            "txt_hora_f": {
                minlength: 4,
                somenteNumeros: true,
                required: function(element) {
                    return $("#txt_tipo_doc").val() == "declaracao";
                }
            },
            "fileToUpload": {
                required: function(element) {
                    return $('#OP').val() === "INS";
                }
                extension: "pdf,jpeg,jpg,png",
                tamanhoArquivo: 5000000
                }
        },
        messages: {
            "txt_crm":{required: "Preencha este campo"},
            "txt_funcionario":{required: "Preencha este campo"},
            "txt_tipo_abs":{required: "Preencha este campo"},
            "txt_tipo_doc":{required: "Preencha este campo"},
            "txt_tipo_afastamento":{required: "Preencha este campo"},
        	"txt_cid": {
        		required: "Preencha este campo",
        		somenteLetras: "Deve conter apenas letras",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
        	},
            "txt_data_i": {
                required: "Preencha este campo",
                somenteNumeros: "Deve conter apenas números",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
            },
            "txt_data_f": {
                required: "Preencha este campo",
                somenteNumeros: "Deve conter apenas números",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
            },
            "txt_data_ini": {
                required: "Preencha este campo",
                somenteNumeros: "Deve conter apenas números",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
            },
            "txt_hora_i": {
                required: "Preencha este campo",
                somenteNumeros: "Deve conter apenas números",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
            },
            "txt_hora_f": {
                required: "Preencha este campo",
                somenteNumeros: "Deve conter apenas números",
                minlength: jQuery.validator.format("Precisa ter no mínimo {0} caracteres")
            },
            "fileToUpload": {
                required: "É necessário anexar um arquivo",
                extension: "Extensão Inválida. O arquivo deve ser PDF ou imagem (jpeg,jpg ou png)",
                tamanhoArquivo: "Tamanho máximo de 5MB"
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