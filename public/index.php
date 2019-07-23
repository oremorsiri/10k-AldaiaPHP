<?php
require_once __DIR__.'/../vendor/autoload.php';
use Geeks\controller\Autenticacion as Auth;

//Abrimos la sesion
$a=new Auth();
$error=null;

    if(isset($_POST)&&count($_POST)>0)
    {
        if($_POST["action"]=="register"){
            $error=$a->registrar($_POST);
        }elseif($_POST["action"]=="login"){
            $error=$a->logar($_POST);
            if($error==null){
                header('Location: reto1.php');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php
        include __DIR__.'/../assets/menu.php';
    ?> 
    <div class="container pagina">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Login</h5>
                        <p class="card-text">
                            <!-- FORMULARIO DE LOGIN-->
                            <form action="index.php" id="login" name="login" method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Introduce tu email">
                                </div>
                                <div class="form-group">
                                    <label for="passwordField">Password</label>
                                    <input type="password" class="form-control" id="passwordField" name="passwordField" placeholder="Password">
                                </div>
                                <input type="hidden" name="action" value="login">
                                <input type="submit" class="btn btn-primary" value="LOGIN">
                            </form>
                        </p>
                        <?php
                                if(isset($_POST)&&count($_POST)>0)
                                {
                                    if($_POST["action"]=="register"){
                                        if($error==null){
                                ?>
                                <div class="alert alert-success" role="alert">
                                Registro realizado correctamente. Puedes logarte
                                </div>
                                <?php
                                        }
                                    }else{
                                        if($error){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=$error?>
                                </div>
                                <?php
                                        }
                                    }
                                }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                            <h5 class="card-title">Registro</h5>
                            <p class="card-text">
                                <!-- FORMULARIO DE REGISTRO-->
                                <form action="index.php" id="registro" name="registro" method="post">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Introduce tu email">
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordField">Password</label>
                                        <input type="password" class="form-control" id="passwordField"  name="passwordField" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordField2">Repite Password</label>
                                        <input type="password" class="form-control" id="passwordField2" name="passwordField2" placeholder="Password">
                                    </div>
                                    <input type="hidden" name="action" value="register">
                                    <input type="submit" class="btn btn-primary" value="REGISTRAR">
                                </form>
                            </p>
                            <?php
                                if($error){
                                    if(isset($_POST)&&count($_POST)>0)
                                    {
                                        if($_POST["action"]=="register"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=$error?>
                                </div>
                                <?php
                                        }
                                    }
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>