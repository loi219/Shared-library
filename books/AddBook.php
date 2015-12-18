<?php
require($_SERVER["DOCUMENT_ROOT"] . "/DB/Database.php");
require($_SERVER["DOCUMENT_ROOT"] . "/books/SearchBooks.php");

class AddBook
{
    function __construct()
    {
$this->sendRequest();


    }
function sendRequest(){

$search=new SearchBooks();
    $this->createQuery($search->getArrayData($_POST['isbn'],'isbn'));


}
    function createQuery($arrayValues)
    {

        foreach($arrayValues as $array) {

            $title = $array['title'];

            $publisher = $array['publisher'];
            $author = $array['author'];
            $resume = $array['resume'];
            $isbn = $array['isbn'];
            $language = $array['language'];
            $date = $array['date'];
            $owner = $array['owner'];
            $pages = $array['pages'];

            if ($this->bookAlreadyAdded($owner, $isbn) == false) {
                $query = "INSERT INTO books (title,isbn,publisher,author,pages,languageB,date_added,fk_owner,resume) VALUES('$title','$isbn','$publisher','$author','$pages','$language','$date','$owner','$resume')";

                $this->addBook($query, $title);

            } else {
                echo "<p>Livre $title déjà ajouté</p>";

            }
        }
    }

    private function bookAlreadyAdded($owner, $isbn)
    {
        $db = new Database();

        $queryControl = "SELECT title,isbn,fk_owner FROM books WHERE isbn='$isbn'";
        $arrayBook = $db->select($queryControl);

        if (sizeof($arrayBook) > 0) {
            if ($arrayBook[0]['isbn'] == $isbn && $arrayBook[0]['fk_owner'] == $owner) {

                return true;
            } else {

                return false;
            }
        }
    }
    function addBook($query)
    {

        $db = new Database();


        if ($db->error()) {
            echo $db->error();

        } else {

            $db->query($query);

        }
    }


}


?>


