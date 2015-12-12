<?php
include($_SERVER["DOCUMENT_ROOT"]."/head_foot/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/head_foot/footer.php");
include("../books/GetBook.php");

if(isset($_GET["id"])){

    $id=$_GET["id"];
    $bookById=new GetBook();
    $array=$bookById->getBooksById($id);

}
?>

<body>

<?php $i=0;
while($i < count($array)){ ?>
<h2><?php echo($array[$i]["title"]);?></h2>
 <div name="infos">
     <ul>
        <li>Auteur: <?php echo($array[$i]["author"]); ?></li>
        <li>Nombre de pages: <?php echo($array[$i]["pages"]); ?></li>
        <li>Description: <?php echo($array[$i]["resume"]); ?></li>
        <li>Langue: <?php echo($array[$i]["languageB"]); ?></li>
        <li>Propriétaire: <a href="mailto:<?php echo($array[$i]["user_email"]); ?>"><?php echo($array[$i]["user_name"]); ?> (<?php echo($array[$i]["user_email"]); ?>)</a></li>
        <li>ISBN: <?php echo($array[$i]["isbn"]); ?></li>
</ul>
 </div>

    <?php $i++; }?>







</body>

