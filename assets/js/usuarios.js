$(function () {
    $("#usertabla").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#usertabla_wrapper .col-md-6:eq(0)');
});

$(document).on("click", "#btnUser", function(){
    $('#nuevo-us').modal('show');
});

$('#formInsuser').on('submit', function(event) {
    event.preventDefault();
    $('#formInsuser').validate({
        rules: {
            txtNombre:{
                required: true,
            },
            txtApellido: {
                required: true,
            },
            txtEmail: {
            required: true,
                email: true,
            },
            txtDPI:{
                required: true,
                number: true,
            },
            txtPhone:{
                required: true,
                number: true,
                minlength: 8,
                maxlength: 8,
            },
            cbxDepto:{
                required: true,
            },
            cbxTipo:{
                required: true,
            },
        },
        messages: {
            txtNombre:{
                required: "Ingrese el nombre del usuario.",
            },
            txtApellido:{
                required: "Ingrese el apellido del usuario.",
            },
            txtEmail: {
                required: "Ingrese el correo electrónico del usuario.",
                email: "Ingrese un correo electrónico válido.",
            },
            txtDPI:{
                required: "Ingrese su DPI",
                number: "Ingrese un No. DPI válido.",
            },
            txtPhone:{
                required: "Ingrese un número telefónico.",
                number: "Ingrese un número telefónico válido.",
                minlength: "Ingrese un número telefónico válido.",
                maxlength: "Ingrese un número telefónico válido.",
            },
            cbxDepto:{
                required: "Ingrese su Depto.",
            },
            cbxTipo:{
                required: "Ingrese el tipo de cliente",
            },
            rolUser: {
                required: "Ingrese el rol del usuario.",
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function() {
            $.ajax({
                url:"../assets/php/insUsuario.php",
                method:"POST",
                data:$("#formInsuser").serialize(),
                beforeSend:function(){
                  document.getElementById("overlay-usuario").innerHTML = "<div class='overlay d-flex justify-content-center align-items-center'><i class='fas fa-2x fa-sync fa-spin'></i></div>";
                },
                success:function(data){
                    toastr.info('Se ha insertado correctamente un nuevo usuario.');
                    $("#databla").load(" #databla");
                },
                complete:function(){
                    $("#databla").load(" #databla");
                    document.getElementById("overlay-usuario").innerHTML = '<div></div>';
                }
            });
            $('#nuevo-us').modal('hide');
        }
    });
});