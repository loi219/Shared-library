<?php
include($_SERVER["DOCUMENT_ROOT"] . "/head_foot/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/head_foot/footer.php");


?>

<h2>Rechercher un ISBN ou un titre</h2>
<div class="addBook">
    <form action="../books/formValues/Add.php" method="get">
        <div class="col-lg-6 col-sm-6 col-sx-6">
        <div class="input-group">
     <div class="row">
                <div class="col-lg-6 col-sm-6 col-sx-6">
                    <div class="input-group">
                        <input  type="text" name="s">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit" data-original-title="" title="">Rechercher</button>
                </span>
                    </div>
                </div>
            </div>
</div>
            </div>

    </form>

</div>
</body>

