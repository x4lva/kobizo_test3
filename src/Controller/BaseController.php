<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{

    public function renderDefault(){
        return [
            "title" => "Welcome!"
        ];
    }

}