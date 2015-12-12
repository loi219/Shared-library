<?php

class AddBook{


function __construct($arrayBooks){

$this->showValuesBooks($arrayBooks);

}


    function createQuery($arrayBookValue){
        $bookValidation = new SearchBooks();

        $date= time();
        $isbn=$arrayBookValue['isbn'];
        $title=$arrayBookValue['title'];
        $author=$arrayBookValue['author'];
        $owner = $_SESSION['user'];

        if ($bookValidation->bookAlreadyAdded($owner, $isbn) == false) {
            $query = "INSERT INTO books (title,isbn,author,date_added,fk_owner) VALUES('$title','$isbn','$author','$date','$owner')";


            $bookValidation->addBook($query, $title);

        } else {
            echo "<p>Livre $title déjà ajouté</p>";

        }

    }



private function showValuesBooks($array){





?>


<div class="row">
    <div class="col-lg-12">

    <select>
<?php foreach($array as $book){ ?>
        <option value="<?php echo "1" ?>"><?php echo $book['title']; }?></option>

    </select>
        <?php }} ?>
        <hr>
    </div>
</div>

