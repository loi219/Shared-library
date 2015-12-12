<?php ?>
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

<nav role="navigation" class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="/index.php" class="navbar-brand">Bibliothèque partagée</a>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Livres <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="/view/viewBooks.php">Afficher tous les livres</a></li>
                    <li><a href="/view/searchBook.php">Ajouter un livre</a></li>
                </ul>
            </li>



        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a id="createAccount" href="register.php">Créer un compte</a></li>
        </ul>
    </div>
</nav>