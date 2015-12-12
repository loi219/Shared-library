<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include($_SERVER["DOCUMENT_ROOT"] . "/head_foot/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/head_foot/footer.php");
require($_SERVER["DOCUMENT_ROOT"].'/books/GetBook.php');
require($_SERVER["DOCUMENT_ROOT"]."/lib/Manage.php");


$books = new GetBook();
$date = new Manage();

$array = $books->getBooksIdUser($_SESSION['user']);


/**
 * TODO add search by
 */

?>

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
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <?php $i=0; while($i < count($array)) { ?>
                        <td><a href="/view/viewDetails.php?id=<?php echo($array[$i]["id_book"]); ?>"><?php echo($array[$i]["title"]); ?></td>
                        <td><?php

                            echo $date->getNameDate($array[$i]['date_added']);

                            ?></td>
                        <td>

                        <button id="deleteBook" onclick="deleteBookById(<?php echo $array[$i]['id_book']; ?>)">Supprimer</button>



                        </td>
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

        $('#myModal').on('show', function() {
            var id = $(this).data('id'),
                removeBtn = $(this).find('.danger');
        })

        $('.confirm-delete').on('click', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#myModal').data('id', id).modal('show');
        });

        $('#btnYes').click(function() {
            // handle deletion here
            var id = $('#myModal').data('id');
            $('[data-id='+id+']').remove();
            $('#myModal').modal('hide');
        });
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



    function deleteBookById($id) {
        if (confirm("Etes vous sûr de supprimer le livre")) {
            window.location.href = "/books/formValues/GetId.php?delete=" + $id;


        }
    }

</script>


