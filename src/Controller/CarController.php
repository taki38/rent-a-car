<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    /**
     * @Route("/car/add", name="car_add")
     */
    public function add(EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm(CarType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()){
            $path = $this->getParameter('kernel.project_dir').'/public/images/cars';
            $car = $form->getData();
            $image = $car->getImage();
            $image -> setPath($path);
            $entityManager->persist($car);
            $entityManager->flush();

            $this->addFlash('success', 'Votre voiture a été ajoutée ave succès');
            return $this->redirectToRoute('dashboard');

        }
        return $this->render('car/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/car/edit/{id}", name="car_edit")
     */
    public function edit(EntityManagerInterface $entityManager, Request $request, Car $car): Response
    {
        $form = $this->createForm(CarType::class,$car);
        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()){
            $path = $this->getParameter('kernel.project_dir').'/public/images/cars';
            $car = $form->getData();
            $image = $car->getImage();
            $image -> setPath($path);
            $entityManager->flush();
            $this->addFlash('success', 'Votre voiture a été modifié ave succès');

            return $this->redirectToRoute('dashboard');

        }
        return $this->render('car/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
