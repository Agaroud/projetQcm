<?php

namespace App\src\controller;

use App\src\model\DAO\QuestionDAO;
use App\src\model\DAO\PropositionDAO;
use App\templates\View;

class ErrorController
{
    
    private $questionDAO;
    private $propositionDAO;
    private $view;
    
    public function __construct()
    {
        $this->questionDAO = new QuestionDAO();
        $this->propositionDAO = new PropositionDAO();
        $this->view = new View();
    }
    
    public function unknown()
    {
        $this->view->render('unknown');
        
    }

    public function error()
    {
        $this->view->render('error');
        
    }
}