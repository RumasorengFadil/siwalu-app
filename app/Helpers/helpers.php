<?php


function upload($file, $location = "upload")
{
    $location = public_path($location);

    $fileName = time() . "." . $file->getClientOriginalName();
    $location = public_path("uploads");

    //Menyimpan gambar di lokal
    $file->move($location, $fileName);

    return $fileName;
}