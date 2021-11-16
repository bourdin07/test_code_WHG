<?php

namespace App\Controller;

use App\Service\BrandGameService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RandomController
 * @package App\Controller
 *
 * @Rest\Route("/game")
 */
class GameController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/all")
     */
    public function getListGame(Request $request, BrandGameService $brandGameService)
    {
        $content = json_decode($request->getContent(), true);
        $brandid = $content["brandid"];
        $country = $content["country"];
        $category = $content["category"];

        return $brandGameService->getListGames($brandid, $country, $category);
    }
}
