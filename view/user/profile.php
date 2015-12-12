<?php
include($_SERVER["DOCUMENT_ROOT"] . "/head_foot/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/head_foot/footer.php");
require($_SERVER["DOCUMENT_ROOT"] . "/lib/Manage.php");
require($_SERVER["DOCUMENT_ROOT"] . "/users/GetUser.php");
$date= new Manage();

$userData = new GetUser;
$array=$userData->getUserBySession($_SESSION['user']);


?>

<div class="container-fluid well span6">
    <div class="row-fluid">
<?php foreach($array as $data){ ?>
        <div class="span8">
            <h3>Nom d'utilisateur: <?php echo $data['user_name']; ?></h3>
            <h5>Mon Adresse: <strong><?php echo $data['user_email']; ?></strong></h5>

<h5>Membre depuis: <strong><?php echo $date->getNameDate($data['user_registration_datetime']); ?></strong></h5>
        </div>
        <?php }?>

        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="icon-wrench"></span> Modify</a></li>
                    <li><a href="#"><span class="icon-trash"></span> Delete</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
