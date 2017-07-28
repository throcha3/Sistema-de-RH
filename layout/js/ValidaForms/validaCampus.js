$(document).ready(function ()
{
    $('#CampusForm').validate({
        rules: {
            "txt_campus": {
                required: true,
                minlength: 4
            }
        },
        messages: {
        	"txt_campus": {
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