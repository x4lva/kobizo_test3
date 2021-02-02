<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends BaseController
{

    /**
     * @Route("api/getrss/{resourse}")
     * @param String $resourse
     * @return Response
     */
    public function getApi(String $resourse){

        $url = "";

        switch ($resourse){
            case 'Habrahab':
                $url = "https://habr.com/en/rss/all/all/";
                break;
            case 'BBC News':
                $url = "http://feeds.bbci.co.uk/news/world/rss.xml";
                break;
            case 'The Guardian':
                $url = "https://www.theguardian.com/world/rss";
                break;
            case 'CNN':
                $url = "http://rss.cnn.com/rss/edition_world.rss";
                break;
        }

        $rss = simplexml_load_file($url);

        $response = new Response($rss->asXML());
        $response->headers->set('Content-Type', 'xml');

        return $response;

    }

}