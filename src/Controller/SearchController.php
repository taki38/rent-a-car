<?php

namespace App\Controller;

use App\Form\SearchCarType;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search_car")
     */
    public function index(Request $request, CarRepository $carRepository): Response
    {
        $cars= [];
        $type='';
        $form= $this->createForm(SearchCarType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()){
            $criteria = $form->getData();
            $cars = $carRepository->searchCar($criteria);
            $type = $criteria["type"];

        }

        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
            'cars' => $cars,
            'type' => $type
        ]);
    }
}
