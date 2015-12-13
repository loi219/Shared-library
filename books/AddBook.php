<?php
include($_SERVER["DOCUMENT_ROOT"]."/head_foot/footer.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);

class AddBook{


function __construct($arrayBooks){


$this->showValuesBooks($arrayBooks);
    $this->createQuery($_POST['id']);

}


    function createQuery($arrayBookValue){

       $query="INSERT INTO books(title) VALUES ('$arrayBookValue')";
    $this->addBook($query);

        /** $bookValidation $bookValidation = new SearchBooks();

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

        } **/

    }


    function addBook($query)
    {

        $db = new Database();


        if ($db->error()) {
            echo $db->error();

        } else {
echo $query;
            $db->query($query);



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
        <button class="triggerClass" id="<?php echo $book['title']; ?>">Ajouter</button>

        <?php


        ?>

    </div>
</div>
<script>

    $(document).ready(function(){
        $(".triggerClass").click(function(){

            var yourId = $(this).attr("id");
            alert(yourId);

            $.ajax({
                url: "/books/AddBook.php",
                method: "GET",
                data: { id : yourId },
                dataType: "html"
            });


        });
    });


</script>

<?php } }?>