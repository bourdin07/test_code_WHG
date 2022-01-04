<?php

namespace App\Controller;

use App\Service\BrandGameService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcher;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GameController
 * @package App\Controller
 *
 * @Rest\Route("/game")
 */
class GameController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/all")
     * @Rest\QueryParam(name="brandid")
     * @Rest\QueryParam(name="country")
     * @Rest\QueryParam(name="category")
     */
    public function getListGame(ParamFetcher $paramFetcher, BrandGameService $brandGameService)
    {
        $brandid = $paramFetcher->get("brandid");
        $country = $paramFetcher->get("country");
        $category = $paramFetcher->get("category");

        return $brandGameService->getListGames($brandid, $country, $category);
    }
}
