<?php

namespace App\Classes;

class Pagination
{
    public $currentPage;
    public $number_of_pages;

    //Check if a Cart already exist and add its values to a "new" Cart:
    public function __construct($currentPage,  $number_of_pages){
            $this->currentPage = $currentPage;
            $this->number_of_pages = $number_of_pages;
    }

}