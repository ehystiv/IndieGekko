<?php


$photos = scandir("../nascite/");

$resultFiles = array();

foreach ($photos as $photo) {
    if ($photo != '.' && $photo != '..') {
        $resultFiles[] = $photo;
    }
}

echo json_encode($resultFiles);

