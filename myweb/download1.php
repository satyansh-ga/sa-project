<?php
    $pap = $_GET['pa'];
    $files = $pap.".pdf";
    header('Content-Disposition; attachment; filename"'.urldecode($files).'"');
    $f1 = fopen($files, r);
    while(!feof($f1)){
        echo fread($f1, 8192);
        flush();
    }
?>