<?php
session_start();

#include($_SERVER["DOCUMENT_ROOT"] . "/head_foot/headerNotConnected.php");
include($_SERVER["DOCUMENT_ROOT"] . "/head_foot/footerNotConnected.php");


if (isset($_SESSION['user']) != "") {

    header("Location: /");
}

require($_SERVER["DOCUMENT_ROOT"]."/lib/password.php");
require($_SERVER["DOCUMENT_ROOT"]."/DB/Database.php");

$db = new Database();




if (isset($_POST['btn-login'])) {

    $email = $_POST['email'];
    $upass = $_POST['password'];
    $res = "SELECT * FROM users WHERE user_email='$email'";
    $row = $db->select($res);



    if (password_verify($upass, $row[0]['user_password_hash'])) {

        $_SESSION['user'] = $row[0]['user_id'];

        header("Location: /index.php");

    } else {
        echo ('<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Erreur!</strong> Informations incorrectes.
</div>');



    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/style/style.css" rel="stylesheet">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="user-scalable=no,width=device-width" />
    <title>Bibliothèque partagée</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#"  id="login-form-link">Se connecter</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#"  class="active" id="register-form-link">S'enregister</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" method="post" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Adresse email" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mot de passe" required>
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                    <label for="remember"> Se souvenir moi</label>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="btn-login" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Se connecter">
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <form id="register-form" action="/login/controler/formValues/userValues.php" method="post" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Nom d'utilisateur" value="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="Adresse email" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="homeTown" id="homeTown" tabindex="3" class="form-control" placeholder="Lieu d'habitation" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="4" class="form-control" placeholder="Mot de passe">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="5" class="form-control" placeholder="Confirmer le mot de passe">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="6" class="form-control btn btn-register" value="Créer mon compte">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {

        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });
</script>

</body>