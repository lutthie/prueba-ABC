<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];
if($varsesion != null || $varsesion != ''){
    header("location: index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    
    <body>
        <div class="text-center">
            <br><br>
        </div>
        
            <div class ="containter mx-auto d-block">
                <div class="row justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <form class="form-signin" action="../php/login.php" method="POST">
                                <div class="text-center mb-4">
                                    <h1 class="h3 mb-3 font-weight-normal"><strong>ABC</strong> Company</h1>
                                    <p id="error"></p>
                                </div>
                                <div class="form-label-group">
                                    <label for="txtUser">Usuario</label>
                                    <input type="text" id="txtUser" name="txtUser" class="form-control" placeholder="Usuario">
                                </div>
                                <br>
                                <div class="form-label-group">
                                <label for="txtContra">Contraseña</label>
                                <input type="password" id="txtContra" name="txtContra" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <br>
                            <button class="btn btn-large btn-info btn-block" type="submit">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>  
  $(document).ready(function(){
    const login = window.location.search;
    const urlParams = new URLSearchParams(login);
    var par = urlParams.get('e');
    if(par == 1){
      document.getElementById("error").innerHTML = '<p class="login-box-msg text-danger">Usuario y/o contraseña incorrectos.</p>';
    }
  });
</script>