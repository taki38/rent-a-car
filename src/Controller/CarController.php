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
            $car->setUser($this->getUser()) ;
            $entityManager->persist($car);
            $entityManager->flush();

            $this->addFlash('success', 'Votre véhicule a été ajoutée ave succès');
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
            $car->setUser($this->getUser()) ;
            $entityManager->flush();
            $this->addFlash('success', 'Votre véhicule a été modifié ave succès');

            return $this->redirectToRoute('dashboard');

        }
        return $this->render('car/edit.html.twig', [
            'form' => $form->createView(),
            'user' => $car->getUser()->getId()
        ]);
    }

    /**
     * @Route("/car/delete/{id}", name="car_delete")
     */
    public function delete(EntityManagerInterface $entityManager, Request $request, Car $car): Response
    {
        if ($this->getUser() == $car->getUser()){


        $entityManager->remove($car);
        $entityManager->flush();
        $this->addFlash('success', 'Votre véhicule a été supprimé ave succès');
        }

        return $this->redirectToRoute('dashboard');
    }

    /**
     * @Route("/user/cars", name="user_cars")
     */
    public function cars(): Response
    {
        $user = $this->getUser();
        $cars = $user->getCars();


        return $this->render('user/cars.html.twig', [
            'cars' => $cars,
        ]);
    }
}
