<?php

namespace App;

class ScrapeValidator 
{
    /**
     * check if file exist
     */
    public function validateFile(Scrape $scrape): bool
    {
        $file_path = $scrape->file_path;
        if (is_file($file_path))
            return true;
        return false;
    }

    public function validateFileSize(Scrape $scrape): bool
    {
        $file_path = $scrape->file_path;
        if (filesize($file_path) < 1024)
            return true;
        return false; 
    }

}