<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include($_SERVER["DOCUMENT_ROOT"] . "/head_foot/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/head_foot/footer.php");



?>
<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Erreur!</strong> Livre introuvable. Remplissez les champs ci-dessous.
</div>
<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">Ajouter un livre</h3>
            </div>

            <div class="panel-body">
                <form class="form-horizontal row-border" action="/books/formValues/Add.php" method="post">
                    <div>
                   <div class="form-group">

                        <div class="col-xs-5">
                            <input class="form-control" name="title" placeholder="Titre" type="text" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-xs-5">
                            <input class="form-control" name="author" placeholder="Auteur" value="" type="text">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-xs-5">
                            <input class="form-control" name="isbn" placeholder="ISBN"  type="text">
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" class="btn btn-primary" value="Ajouter ce livre à ma collection">
                                </div>
                            </div>
                        </div>


</div>
                </form>




