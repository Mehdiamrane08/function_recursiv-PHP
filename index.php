<?php

parseDirAndDeleteFiles('/var/www/html/test-alternance');

function parseDirAndDeleteFiles($path) {
    $racine = scandir($path);
    for ($i=0; $i < count($racine) ; $i++){ 
        $value = $racine[$i];

        if (($value != '.') && ($value != '..'))
            {
                $fullPath = $path . '/' . $value;
                
                $isCorrect = isCorrectFile($fullPath);
                if($isCorrect == true){
                    unlink($fullPath);
                    echo ' deleted';
                }
                if (is_dir($fullPath)) {
                    parseDirAndDeleteFiles($fullPath);
                }
                echo '<br>';
            }
    };
    echo '<br>';
    echo '<br>';

}

function isCorrectFile($filePath){
    if(!file_exists($filePath)){
        return false;
    }
    $result = explode( ".bak", $filePath);
    $length = count($result);
    echo $length;
    if($length >= 2){
        return true;
    } else {
        return false;

    } 
} 
?> 
