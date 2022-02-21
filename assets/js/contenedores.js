$(function () {
    $("#tablacont").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#tablacont_wrapper .col-md-6:eq(0)');
});

$(document).on("click", "#btnContenedor", function(){
    $('#nuevo-cont').modal('show');
});

$('#formInscont').on('submit', function(event) {
    event.preventDefault();
    $('#formInscont').validate({
        rules: {
            txtNombre:{
                required: true,
            },
            txtFecha:{
                required: true,
            },
        },
        messages: {
            txtNombre:{
                required: "Ingrese el nombre del contenedor.",
            },
            txtFecha:{
                required: "Ingrese fecha de arrivo.",
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
                url:"../assets/php/insContenedor.php",
                method:"POST",
                data:$("#formInscont").serialize(),
                beforeSend:function(){
                  document.getElementById("overlay-contenedor").innerHTML = "<div class='overlay d-flex justify-content-center align-items-center'><i class='fas fa-2x fa-sync fa-spin'></i></div>";
                },
                success:function(data){
                    toastr.info('Se ha insertado correctamente un nuevo contenedor.');
                    $("#tablacont").load(" #tablacont");
                },
                complete:function(){
                    $("#tablacont").load(" #tablacont");
                    document.getElementById("overlay-contenedor").innerHTML = '<div></div>';
                }
            });
            $('#nuevo-cont').modal('hide');
        }
    });
});

$(document).on("click", "#btnVerPro", function(){
    var verPro=$(this).attr('value');
    $.post("../assets/php/modal/verProduct.php",{IDCONTENEDOR:verPro},function(data){
        $('#modal-prodcont').modal('show');
        document.getElementById("prodcontmod").innerHTML = data.trim();
    });
});

$(document).on("click", "#btnDelCont", function(){
    var delCont=$(this).attr('value');
    $.post("../assets/php/modal/delConten.php",{IDCONTENEDOR:delCont},function(data){
        $('#modal-delCont').modal('show');
        document.getElementById("delContmod").innerHTML = data.trim();
    });
});

$(document).on("click", "#btncancelarConten", function(){
    $('#modal-delCont').modal('hide');
});

$(document).on("click", "#btnborrarConten", function(event){
    event.preventDefault();
    $.ajax({
        url:"../assets/php/delContenedor.php",
        method:"POST",
        data:$("#formDeleteConten").serialize(),
        beforeSend:function(){
            document.getElementById("overlay-delCont").innerHTML = "<div class='overlay d-flex justify-content-center align-items-center'><i class='fas fa-2x fa-sync fa-spin'></i></div>";
        },
        success:function(data){
            toastr.warning('Se eliminó correctamente el registro.');
            $("#tablacont").load(" #tablacont");
        },
        complete:function(){
            $("#tablacont").load(" #tablacont");
            document.getElementById("overlay-delCont").innerHTML = '<div></div>';
        }
    });
    $('#modal-delCont').modal('hide');
});