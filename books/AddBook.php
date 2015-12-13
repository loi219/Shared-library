<?php
include($_SERVER["DOCUMENT_ROOT"]."/head_foot/footer.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);

class AddBook{


function __construct($arrayBooks){


$this->showValuesBooks($arrayBooks);


}


    function createQuery($arrayBookValue){
echo $arrayBookValue;
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
    echo $_POST['title'];
    /**
     * $title = $arrayValues['title'];

    $publisher = $arrayValues['publisher'];
    $author = $arrayValues['author'];
    $resume = $arrayValues['resume'];
    $isbn = $arrayValues['isbn'];
    $language = $arrayValues['language'];
    $date = $arrayValues['date'];
    $owner = $arrayValues['owner'];
    $pages = $arrayValues['pages'];
     */
?>


    <div class="row">
        <div class="col-lg-12">
            <table class="table" id="table">
                <thead>


                <tr>

                    <th>Titre</th>
                    <th>Editeur</th>
                    <th>Auteur</th>
                    <th>ISBN</th>
                </tr>
                </thead>
                <tbody>


                <?php foreach($array as $book){?>
                <form method="POST" action="#">
                <tr>

                    <td name="title" value="title"><?php echo $book['title']; ?></td>
                    <td name="publisher"><?php echo $book['publisher']; ?></td>
                    <td name="author" ><?php echo $book['author']; ?></td>
                    <td name="isbn"><?php echo $book['isbn']; ?></td>

                    <td><button type="submit">Ajouter</button></td>
<?php } ?>
                    </form>
                </tr>



                </tbody>
            </table>
            <hr>
        </div>
    </div>

    <script src="/lib/JS/jquery-2.1.4.min.js"></script>
    <script src="/lib/bootstrap/js/bootstrap.min.js"></script>

<?php } }?>