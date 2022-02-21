$(function () {
    $("#productabla").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#productabla_wrapper .col-md-6:eq(0)');
});

function valideKey(evt){
    var code = (evt.which) ? evt.which : evt.keyCode;
    if(code==8) {
        return true;
    } else if(code>=48 && code<=57) {
        return true;
    } else{
        return false;
    }
}

$(document).on("click", "#btnProducto", function(){
    $('#nuevo-pro').modal('show');
});

$(document).on("click", "#btnCategoria", function(){
    $('#nuevo-cat').modal('show');
});

$('#formInsCateg').on('submit', function(event) {
    event.preventDefault();
    $('#formInsCateg').validate({
        rules: {
            txtnombreCat:{
                required: true,
            },
        },
        messages: {
            txtnombreCat:{
                required: "Ingrese el nombre de la categoría.",
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
                url:"../assets/php/insCategoria.php",
                method:"POST",
                data:$("#formInsCateg").serialize(),
                beforeSend:function(){
                  document.getElementById("overlay-categoria").innerHTML = "<div class='overlay d-flex justify-content-center align-items-center'><i class='fas fa-2x fa-sync fa-spin'></i></div>";
                },
                success:function(data){
                    toastr.info('Se ha insertado correctamente una nueva categoría.');
                    $("#cateibol").load(" #cateibol");
                },
                complete:function(){
                    $("#cateibol").load(" #cateibol");
                    document.getElementById("overlay-categoria").innerHTML = '<div></div>';
                }
            });
            $('#nuevo-cat').modal('hide');
        }
    });
});

$(document).on("click", "#btnEditPro", function(){
    editPro=$(this).attr('value');
    $.post("../assets/php/modal/editProduc.php",{IDPRODUCTO:editPro},function(data){
        $('#modal-editProduc').modal('show');
        document.getElementById("editProductmod").innerHTML = data.trim();
    });
});

$(document).on('click',"#btneditarProducto", function(event){
    event.preventDefault();
    $.ajax({
        url:"../assets/php/ediProducto.php",
        method:"POST",
        data:$("#formEditProduct").serialize(),
        beforeSend:function(){
            document.getElementById("overlay-editProduc").innerHTML = "<div class='overlay d-flex justify-content-center align-items-center'><i class='fas fa-2x fa-sync fa-spin'></i></div>";
        },
        success:function(data){
            toastr.success('Se editó correctamente el registro.');
            $("#productabla").load(" #productabla");
        },
        complete:function(){
            $("#productabla").load(" #productabla");
            document.getElementById("overlay-editProduc").innerHTML = '<div></div>';
        }
    });
    $('#modal-editProduc').modal('hide');
});

$(document).on("click", "#btneditFotopro", function(){
    var editFotoPro=$(this).attr('value');
    $.post("../assets/php/modal/editFotoProduct.php",{IDPRODUCTO:editFotoPro},function(data){
        $('#modal-editFotoProduc').modal('show');
        document.getElementById("editFotoProducmod").innerHTML = data.trim();
    });
});

$(document).on("click", "#btnVerProve", function(){
    var verProve = $(this).attr('value');
    $.post("../assets/php/modal/verProvee.php",{IDUSUARIO:verProve},function(data){
        $('#modal-verProvee').modal('show');
        document.getElementById("verProveemod").innerHTML = data.trim();
    });
});

$(document).on("click", "#btnDelPro", function(){
    var delProdu = $(this).attr('value');
    $.post("../assets/php/modal/delProduc.php",{IDPRODUCTO:delProdu},function(data){
        $('#modal-delProduc').modal('show');
        document.getElementById("delProducmod").innerHTML = data.trim();
    });
});

$(document).on("click", "#btncancelarProduc", function(){
    $('#modal-delProduc').modal('hide');
});

$(document).on("click", "#btnborrarProduc", function(event){
    event.preventDefault();
    $.ajax({
        url:"../assets/php/delProducto.php",
        method:"POST",
        data:$("#formDeleteProduc").serialize(),
        beforeSend:function(){
            document.getElementById("overlay-delProduc").innerHTML = "<div class='overlay d-flex justify-content-center align-items-center'><i class='fas fa-2x fa-sync fa-spin'></i></div>";
        },
        success:function(data){
            toastr.warning('Se eliminó correctamente el registro.');
            $("#productabla").load(" #productabla");
        },
        complete:function(){
            document.getElementById("overlay-delProduc").innerHTML = '<div></div>';
        }
    });
    $('#modal-delProduc').modal('hide');
});