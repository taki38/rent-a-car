<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\CarRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
        ]);
    }

    /**
     * @Route("/admin/users", name="admin_users")
     */
    public function users(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        return $this->render('admin/users.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/admin/delete//user/{id}", name="user_delete")
     */
    public function delete(EntityManagerInterface $entityManager, User $user): Response
    {

            $entityManager->remove($user);
            $entityManager->flush();
            $this->addFlash('success', "L'utilisateur a été supprimé ave succès");


        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/admin/cars", name="admin_cars")
     */
    public function adminCar(CarRepository $carRepository): Response
    {
        $cars = $carRepository->findAll();
        return $this->render('admin/cars.html.twig', [
            'cars' => $cars,
        ]);
    }

    /**
     * @Route("/admin/voitures", name="admin_voitures")
     */
    public function adminVoiture(CarRepository $carRepository): Response
    {
        $cars = $carRepository->findBy(array('type'=>'Voiture'));
        return $this->render('admin/voitures.html.twig', [
            'cars' => $cars,
        ]);
    }

    /**
     * @Route("/admin/utilitaires", name="admin_utilitaires")
     */
    public function adminUtilitaire(CarRepository $carRepository): Response
    {
        $cars = $carRepository->findBy(array('type'=>'Utilitaire'));
        return $this->render('admin/utilitaires.html.twig', [
            'cars' => $cars,
        ]);
    }

}
