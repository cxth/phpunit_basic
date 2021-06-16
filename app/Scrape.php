<?php

namespace App;

use Spatie\DataTransferObject\DataTransferObject;

class Scrape extends DataTransferObject{

    public string $file_path;

    public static function create($file_path)
    {
        return new self([
            'file_path' => $file_path
        ]);
    }
}