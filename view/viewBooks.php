<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include($_SERVER["DOCUMENT_ROOT"]."/head_foot/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/head_foot/footer.php");
require($_SERVER["DOCUMENT_ROOT"].'/books/GetBook.php');
require($_SERVER["DOCUMENT_ROOT"]."/lib/Manage.php");




$books = new GetBook();
$date = new Manage();
$array=$books->getBooks();
/**

 * TODO add search by
 */

?>
<!---source; http://github.com/stidges/jquery-searchable -->
<div class="container">
    <div class="row">

    <div class="row">
        <div class="col-lg-12">
            <h3>Tous les livres</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <input type="search" id="search" value="" class="form-control" placeholder="Rechercher">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" id="table">
                <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date d'ajout</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <?php $i=0; while($i < count($array)) { ?>
                    <td><a href="viewDetails.php?id=<?php echo($array[$i]["id_book"]); ?>"><?php echo($array[$i]["title"]); ?></td>
                    <td><?php

                        echo $date->getNameDate($array[$i]['date_added']);

                        ?></td>
                </tr>
                <?php  $i++; }?>
                </tbody>
            </table>
            <hr>
        </div>
    </div>

</div>
<script src="/lib/JS/search.js"></script>
<script>


    $(function () {
        $( '#table' ).searchable({
            striped: true,
            oddRow: { 'background-color': '#f5f5f5' },
            evenRow: { 'background-color': '#fff' },
            searchType: 'fuzzy'
        });

        $( '#searchable-container' ).searchable({
            searchField: '#container-search',
            selector: '.row',
            childSelector: '.col-xs-4',
            show: function( elem ) {
                elem.slideDown(100);
            },
            hide: function( elem ) {
                elem.slideUp( 100 );
            }
        })
    });
</script>


