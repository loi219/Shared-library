<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

#include($_SERVER["DOCUMENT_ROOT"]."/head_foot/header.php");
#include($_SERVER["DOCUMENT_ROOT"]."/head_foot/footer.php");
#include('../books/SearchBooks.php');



?>

<body>

<?php $i = 0;
while ($i < count($array))
{ ?>
<h2><?php echo ($array[$i]["title"]);
    ?></h2>

<div name="infos">
    <ul>
        <li>Auteur: <?php echo ($array[$i]["author"]); ?></li>
        <li>Nombre de pages: <?php echo ($array[$i]["pages"]); ?></li>
        <li>Description: <?php echo ($array[$i]["resume"]); ?></li>
        <li>Langue: <?php echo ($array[$i]["languageB"]); ?></li>
        <li>Lecteur: <?php echo ($array[$i]["reader"]); ?></li>
        <li>ISBN: <?php echo ($array[$i]["isbn"]); ?></li>
    </ul>
</div>

<?php $i++;
}
    ?>







</body>




