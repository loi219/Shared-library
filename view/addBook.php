<?php

include($_SERVER["DOCUMENT_ROOT"]."/head_foot/footer.php");
//require($_SERVER["DOCUMENT_ROOT"] . "/books/SearchBooks.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);

class AddBookView{


    function __construct(){
        $search=new SearchBooks();


        $this->showValuesBooks($search->getArrayData($_GET['s'],'search'));


    }


    function createQuery($arrayBookValue){
        echo $arrayBookValue;
        $query="INSERT INTO books(title) VALUES ('$arrayBookValue')";
        $this->addBook($query);



    }



    private function showValuesBooks($array){


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

                    <tr>

                        <td name="title" ><?php echo $book['title']; ?></td>
                        <td name="publisher"><?php echo $book['publisher']; ?></td>
                        <td name="author" ><?php echo $book['author']; ?></td>
                        <td name="isbn"><?php echo $book['isbn']; ?></td>

                        <td><input type="button" class="triggerClass" onmousedown="this.style.background='#41A317'" id="<?php echo $book['isbn'];  ?>" value="Ajouter" onclick="return added(this)"></td>
                        <?php } ?>

                    </tr>



                    </tbody>
                </table>
                <hr>
            </div>
        </div>

        <script src="/lib/JS/jquery-2.1.4.min.js"></script>

        <script>

        function added(button){

        button.value="Ajouté!";


        }


            $(document).ready(function(){
                $(".triggerClass").click(function(){


                    var yourId = $(this).attr("id");

                    $.ajax({
                        url: "/books/AddBook.php",
                        method: "POST",
                        data: {isbn : yourId },

                    });


                });
            });
        </script>
</html>
    <?php } }?>