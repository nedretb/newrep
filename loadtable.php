<?php

    include "dbh.php";

    $loadTable = new Dbh();
    echo $loadTable->selectTable();