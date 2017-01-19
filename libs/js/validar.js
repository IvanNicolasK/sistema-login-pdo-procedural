$('document').ready(function ()
{
    // name validation
    var nameregex = /^[a-zA-Z ]+$/;

    $.validator.addMethod("validname", function (value, element) {
        return this.optional(element) || nameregex.test(value);
    });

    // valid email pattern
    var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    $.validator.addMethod("validemail", function (value, element) {
        return this.optional(element) || eregex.test(value);
    });

    $("#form-login").validate({

        rules:
                {
                    nome: {
                        required: true,
                        validname: true,
                        minlength: 4
                    },
                    email: {
                        required: true,
                        validemail: true
                    },
                    senha: {
                        required: true,
                        minlength: 6,
                        maxlength: 15
                    },
                    senha2: {
                        required: true,
                        equalTo: '#senha'
                    },
                },
        messages:
                {
                    nome: {
                        required: "Digite seu Nome",
                        validname: "Nome só deve conter letras e espaços",
                        minlength: "O nome deve conter mais que quatro caracteres"
                    },
                    email: {
                        required: "Digite seu Email",
                        validemail: "Entre com um e-mail válido"
                    },
                    senha: {
                        required: "Digite sua Senha",
                        minlength: "A senha deve ter no minimo 6 caracteres"
                    },
                    senha2: {
                        required: "Por Favor Repita a Senha",
                        equalTo: "As senhas não conferem !"
                    }
                },
        errorPlacement: function (error, element) {
            $(element).closest('.form-group').find('.msg-erro').html(error.html());
        },
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            $(element).closest('.form-group').find('.msg-erro').html('');
        },

        submitHandler: function (form) {
            form.submit();
        }
    });

});