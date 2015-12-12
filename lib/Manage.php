<?php

class Manage{
    function getNameDate($unixTime)
    {

        $dateName = date('j F Y', $unixTime);

        return $dateName;

    }

}

?>