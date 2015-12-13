<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Class manageBooks
 *
 *
 */

class SearchBooks
{
    private $arrayBooks=array();

    function setChoice($searchString)
    {

        $this->requestIsbnApi($searchString);
        $this->isbnUser = $searchString;

    }


    private function requestIsbnApi($searchString)
    {


        //$url="http://isbndb.com/api/v2/xml/2E137ZRR/books?q=".$searchString;
        $url = "http://127.0.0.1/examples/book_multi.xml";
        $stringXml = file_get_contents($url);

        $this->controlErrorXML($stringXml);


    }


    private function controlErrorXML($url)
    {


        $book = simplexml_load_string($url,null, LIBXML_NOCDATA);

        $error = $book->error[0];

        if ($error == "") {
            $this->generateHTMLView($book);


        } else {

            $this->redirectBookNotFound();

        }

    }


    private function redirectBookNotFound()
    {
        print ("<script>window.location= '/view/bookNotFound.php'</script>");

    }

    function createQuery($arrayValues)
    {


        $title = $arrayValues['title'];

        $publisher = $arrayValues['publisher'];
        $author = $arrayValues['author'];
        $resume = $arrayValues['resume'];
        $isbn = $arrayValues['isbn'];
        $language = $arrayValues['language'];
        $date = $arrayValues['date'];
        $owner = $arrayValues['owner'];
        $pages = $arrayValues['pages'];

        if ($this->bookAlreadyAdded($owner, $isbn) == false) {
            $query = "INSERT INTO books (title,isbn,publisher,author,pages,languageB,date_added,fk_owner,resume) VALUES('$title','$isbn','$publisher','$author','$pages','$language','$date','$owner','$resume')";


            $$this->generateHTMLView($arrayValues);
            #$this->addBook($query, $title);

        } else {
            echo "<p>Livre $title déjà ajouté</p>";

        }
    }


    function generateHTMLView($xmlBook)
    {


        foreach ($xmlBook->data as $item) {

            $title = $item->title;
            $lengthTitle = strlen($title);

            if ($lengthTitle > 30) {
                $numberToDelete = '-' . $lengthTitle + 30;
                $title = mb_substr($title, 0, $numberToDelete) . '...';
            } else {

                $title;
            }
            $publisher = $item->publisher_name;
            foreach ($item->author_data as $authorData) {
                $author = $authorData->name;

            }

            $pages = $item->physical_description_text;
            $resume = $item->summary;
            $resUn = addcslashes($resume, ",'-");
            $isbn13 = $item->isbn13;
            $languageB = $item->language;

            $this->consctructArrayBooks($title,$isbn13,$publisher,$author,$pages,$languageB,$resUn);

        }
        $this->showBooks($this->arrayBooks);

        /*echo('

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

                ');

        $id=0;
        foreach ($xmlBook->data as $item) {

            $title = $item->title;
            $lengthTitle=strlen($title);

            if($lengthTitle >30){
                $numberToDelete='-'.$lengthTitle+30;
                $titleTemp=mb_substr($title,0,$numberToDelete).'...';
            }else{

                $titleTemp=$title;
            }
            $publisher = $item->publisher_name;
            foreach ($item->author_data as $authorData) {
                $author = $authorData->name;

            }

            $pages = $item->physical_description_text;
            $resume = $item->summary;
            $resUn = addcslashes($resume, ",'-");
            $isbn13 = $item->isbn13;
            $languageB = $item->language;


$this->showBooks();

            echo('

<tr>

                    <td>' . $titleTemp . '</td>
                    <td>' . $publisher . '</td>
                    <td>' . $author . '</td>
                    <td>' . $isbn13 . '</td>

                    <td><button class="triggerClass" id="'.$id.' " >Ajouter</button></td>

</tr>

                ');
            $id++;  }
        echo ('

                </tbody>
                </table>
                <hr>
                </div>
                </div>

<script src="/lib/JS/jquery-2.1.4.min.js"></script>
<script src="/lib/bootstrap/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function(){
        $(".triggerClass").click(function(){

            var yourId = $(this).attr("id");

         $.ajax({
                url: "/books/AddBook.php",
                method: "POST",
                data: { id : yourId },
                dataType: "html"
            });


        });
    });



                </script>
                </body>
                </html>
                ');

        if(isset($_POST['id'])) {
            $idBook=$_POST['id'];
            echo $idBook;
            $this->getBookArray($idBook);
}else{

            echo $_POST['id'];

        }*/

    }



    private function consctructArrayBooks($title,$isbn,$publisher,$author,$pages,$language,$resume){


        $arrayBook['title']=$title;
        $arrayBook['publisher']=$publisher;
        $arrayBook['author']=$author;
        $arrayBook['resume']=$resume;
        $arrayBook['pages']=$pages;
        $arrayBook['isbn']=$isbn;
        $arrayBook['language']=$language;
        $arrayBook['resume']=$resume;


        array_push($this->arrayBooks,$arrayBook);



    }

    private function showBooks(){

        new AddBook($this->arrayBooks);

    }


    }
    function chooseArrayBook($id){

        echo $id;
    }



    function bookAlreadyAdded($owner,$isbn)
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


    function getArrayView(){


    }

    function addBook($query,$title)
    {

        $db = new Database();



        if($db->error()){
            echo $db->error();

        }else {

            $db->query($query);

            echo ('<div class="alert alert-success fade in">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                          Livre <strong>'.$title.'</strong> ajouté dans la collection.
                    </div>');



        }


    }







