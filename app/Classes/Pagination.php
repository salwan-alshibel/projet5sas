<?php

namespace App\Classes;

class Pagination
{
    public $currentPage;
    public $number_of_pages;

    
    public function __construct($currentPage,  $number_of_pages){
            $this->currentPage = $currentPage;
            $this->number_of_pages = $number_of_pages;
    }

}