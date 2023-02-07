<?php

class BookController
{
    public $model;
    public function __construct()
    {
        //Linux connection
            //require_once("/opt/lampp/htdocs/Femcoders_Library/model/BookModel.php");
        //Mac connection
           // require_once("/Applications/MAMP/htdocs/Femcoders_Library/model/BookModel.php");
        //Windows connection
            require_once("C:/xampp/htdocs/Femcoders_Library/model/BookModel.php");
        $this->model = new BookModel(); 
    }

    public function getBooks()
    {
        return ($this->model->getBooks() ? $this->model->getBooks() : 'There is no books in database');
    }
}

// $controller = new BookController;
// var_dump($controller->getBooks());