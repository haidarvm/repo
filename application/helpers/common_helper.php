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
    if(preg_match('(BAB III|BAB IV|BAB V|BAB_III|BAB_IV|BAB_V|BAB 3|BAB 4|BAB 5|BAB_3|BAB_4|BAB_5)', $filename) === 1) {
        return false;
     }  else  {
         return true;
     }
}