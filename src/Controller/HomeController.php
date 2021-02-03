<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends BaseController
{

    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function homePage(){
        $forRender = parent::renderDefault();
        $forRender["title"] = "Home Page";
        

        return $this->render("home.html.twig", $forRender);

    }

}