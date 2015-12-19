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
    private $arrayBooks = array();


function getArrayData($searchString,$type){

    $this->requestIsbnApi($searchString,$type);

    return $this->arrayBooks;

}

    private function requestIsbnApi($searchString,$type)
    {


        switch ($type){

            case 'search':
                $url="http://isbndb.com/api/v2/xml/2E137ZRR/books?q=".$searchString;
                //$url = "http://127.0.0.1/examples/book_multi.xml";
                break;

            case 'isbn':
                //TODO Get ISBN URL FROM API
                $url="http://isbndb.com/api/v2/xml/2E137ZRR/book/$searchString";
                //$url = "http://127.0.0.1/examples/book.xml";
                break;
        }

        $stringXml = file_get_contents($url);

        $this->controlErrorXML($stringXml);


    }


    private function controlErrorXML($url)
    {


        $book = simplexml_load_string($url, null, LIBXML_NOCDATA);

        $error = $book->error[0];

        if ($error == "") {
            $this->getData($book);


        } else {

            $this->redirectBookNotFound();

        }

    }


    private function redirectBookNotFound()
    {
        print ("<script>window.location= '/view/bookNotFound.php'</script>");

    }




    private function getData($xmlBook)
    {


        foreach ($xmlBook->data as $item) {

            $title = $item->title;
            $lengthTitle = strlen($title);

            if ($lengthTitle > 30) {
                $numberToDelete = '-' . $lengthTitle + 30;
                $title = mb_substr($title, 0, $numberToDelete) . '...';
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

            $this->consctructArrayBooks($title, $isbn13, $publisher, $author, $pages, $languageB, $resUn);

        }



    }


    private function consctructArrayBooks($title, $isbn, $publisher, $author, $pages, $language, $resume)
    {

        $arrayBook['title'] = $title;
        $arrayBook['publisher'] = $publisher;
        $arrayBook['author'] = $author;
        $arrayBook['resume'] = $resume;
        $arrayBook['pages'] = $pages;
        $arrayBook['isbn'] = $isbn;
        $arrayBook['language'] = $language;
        $arrayBook['resume'] = $resume;
        $arrayBook['owner'] = $_SESSION['user'];
        $arrayBook['date']=time();


        array_push($this->arrayBooks, $arrayBook);


    }



}







