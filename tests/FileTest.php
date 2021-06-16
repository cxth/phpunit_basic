<?php

namespace Tests;

use App\Scrape;
use App\ScrapeValidator;
use PHPUnit\Framework\TestCase;


class FileTest extends TestCase 
{
    /**
     * test $file if exist
     * @dataProvider getfiles
     * @param $file_path
     */
    public function test_valid_file_path_returns_true($file_path)
    {
        $scrape = Scrape::create($file_path);

        $scrapeValidator = new ScrapeValidator;
        $file_status = $scrapeValidator->validateFile($scrape);
        
        // echo the variable
        //fwrite(STDERR, print_r($scrape->file_path, TRUE));
        $this->assertTrue($file_status);
    }

    /**
     * test $file is less than 1mb
     * @dataProvider getfiles
     * @param $file_path
     */
    public function test_valid_file_size_returns_acceptable_size($file_path)
    {
        $scrape = Scrape::create($file_path);

        $scrapeValidator = new ScrapeValidator;
        $file_status = $scrapeValidator->validateFileSize($scrape);

        $this->assertTrue($file_status);
    }


    // the data provider
    public function getfiles()
    {
        return [
            ["C:\\Users\\User\\Desktop\\Tutorials\\test\\hello.txt"],
            //["C:\\Users\\User\\Desktop\\Tutorials\\test\\hello1.txt"]
        ];
    }
}