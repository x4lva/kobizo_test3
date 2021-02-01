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

    /**
     * @Route("/getreditrss", name="getreddit", methods={"GET"})
     */
    public function getReditRSS(){
        $rss = simplexml_load_file('https://habr.com/en/rss/all/all/');


        $response = new Response($rss->asXML());
        $response->headers->set('Content-Type', 'xml');

        return $response;

    }
}