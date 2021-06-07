<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="dashboard")
     */
    public function index(EntityManagerInterface $entityManager, CarRepository $carRepository): Response
    {
        $cars = $carRepository->findAll();
        $path = $this->getParameter('kernel.project_dir').'/public/images/cars';
        return $this->render('dashboard/index.html.twig', [
            'cars' => $cars,
        ]);
    }
}
