<?php

function filePath() {
    return date('Y') . '/' . date('m') . '/';
}

function filePaths() {
    return FCPATH . 'assets/files/';
}

function fileFullPath() {
    $fullpath = FCPATH . 'assets/files/' . date('Y') . '/' . date('m') . '/';
    if (file_exists($fullpath)) {
        return $fullpath;
    }
    return  createFilePath();
}

function indoDate($date) {
    return date('d-m-Y', strtotime($date));
}


function year($date) {
    return date('Y', strtotime($date));
}



function str_slug($string, $separator = '-') {
    // Convert all dashes/underscores into separator
    $flip = '-' == $separator ? '_' : '-';
    $string = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, trim($string));

    // Remove all characters that are not the separator, letters, numbers, or whitespace.
    $string = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', mb_strtolower(trim($string)));

    // Replace all separator characters and whitespace by a single separator
    $string = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, trim($string));
    
    if (!is_string($string)) {
        return trim($string, $separator);
    } else {
        return trim($string);
    }
}

function readKeyword($title) {
    $keyword = explode(" ",trim($title));
    $implode = implode(",", $keyword);
    return $implode;
}

function metaDescription($content) {
    $cleanContent = strip_tags(html_entity_decode($content));
    if (strlen($cleanContent) > 171) {
        $cutContent = substr($cleanContent, 0, strpos($cleanContent, ' ', 171));
        // var_dump($cutContent);
        $removeFirstThree = str_ireplace('#', '', $cutContent);  
        $removeEmpty = preg_replace('/\s*$/','',$removeFirstThree);
        // foreach(explode(" ", $removeEmpty) as $text) {
        //     var_dump(textBinASCII($text));
        // }
        $cleanChar = preg_replace('/[^A-Za-z0-9 !@#$%^&*().]/u','', strip_tags($removeEmpty));
        $arrText = array_filter(explode(" ", $cleanChar));
        return implode(' ',$arrText);
    }
    return $content;
}


function createFilePath() {
    $path = FCPATH . 'assets/files/';

    $year_folder = $path . date('Y');
    $month_folder = $year_folder . '/' . date('m');

    !file_exists($year_folder) && mkdir($year_folder, 0777);
    !file_exists($month_folder) && mkdir($month_folder, 0777);

    $path = $month_folder;
    return $path . $month_folder;
}

 function uniqeID() {
     return base_convert(rand(1000000000, PHP_INT_MAX), 10, 36);
 }

function getFileName($filecomplete) {
    return pathinfo($filecomplete, PATHINFO_FILENAME);
}

function getFileNameExt($filecomplete) {
    return pathinfo($filecomplete, PATHINFO_BASENAME);
}

function fileExt($ext) {
    return str_replace('.', '', $ext);
}

function getFileExt($filecomplete) {
    return '.' . pathinfo($filecomplete, PATHINFO_EXTENSION);
}

function notallowed($filename) {
    if(preg_match('(BAB III|BAB V|BAB_III|BAB_V|BAB 3|BAB 5|BAB_3|BAB_4|BAB_5)', $filename) === 1) {
        return false;
     }  else  {
         return true;
     }
}
