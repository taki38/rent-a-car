<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\CarImage;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DomCrawler\Image;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {



        $user1 = new User();
        $user1 -> setEmail('user@email.fr');
        $user1 -> setFirstname('User');
        $user1 -> setLastname('User');
        $user1 -> setPhone('0673643007');
        $user1 ->setPassword($this->passwordEncoder->encodePassword($user1, '123456789'));
        $manager->persist($user1);
        $manager->flush();

        $user2 = new User();
        $user2 -> setRoles(['ROLE_ADMIN']);
        $user2 -> setEmail('admin@email.fr');
        $user2 -> setFirstname('Admin');
        $user2 -> setLastname('Admin');
        $user2 -> setPhone('0673643007');
        $user2->setPassword($this->passwordEncoder->encodePassword($user2, '123456789'));

        $manager->persist($user2);
        $manager->flush();

        $user3 = new User();
        $user3 -> setEmail('autreuser@email.fr');
        $user3 -> setFirstname('User2');
        $user3 -> setLastname('User2');
        $user3 -> setPhone('0673643007');
        $user3 ->setPassword($this->passwordEncoder->encodePassword($user3, '123456789'));
        $manager->persist($user3);
        $manager->flush();

        $car = new Car();
        $car -> setName('Peugeot 2008');
        $car -> setFuel('Diesel');
        $car -> setGearBox('Manuelle');
        $car -> setType('Voiture');
        $car -> setLuggage(2);
        $car -> setUser($user1);
        $car -> setPlaces(5);

        $manager->persist($car);
        $manager->flush();

        $car = new Car();
        $car -> setName('Clio 4');
        $car -> setFuel('Essence');
        $car -> setGearBox('Manuelle');
        $car -> setType('Voiture');
        $car -> setLuggage(3);
        $car -> setUser($user1);
        $car -> setPlaces(5);

        $manager->persist($car);
        $manager->flush();

        $car = new Car();
        $car -> setName('Golf V');
        $car -> setFuel('Diesel');
        $car -> setGearBox('Manuelle');
        $car -> setType('Voiture');
        $car -> setLuggage(2);
        $car -> setUser($user2);
        $car -> setPlaces(5);

        $manager->persist($car);
        $manager->flush();

        $car = new Car();
        $car -> setName('Renault Kadjar');
        $car -> setFuel('Diesel');
        $car -> setGearBox('Manuelle');
        $car -> setType("Voiture");
        $car -> setLuggage(4);
        $car -> setUser($user1);
        $car -> setPlaces(5);

        $manager->persist($car);
        $manager->flush();

        $car = new Car();
        $car -> setName('Peugeot Partner');
        $car -> setFuel('Diesel');
        $car -> setGearBox('Manuelle');
        $car -> setType('Utilitaire');
        $car -> setLuggage(3);
        $car -> setUser($user2);
        $car -> setPlaces(5);

        $manager->persist($car);
        $manager->flush();

        $car = new Car();
        $car -> setName('Mercedes Vito');
        $car -> setFuel('Essence');
        $car -> setGearBox('Manuelle');
        $car -> setType('Utilitaire');
        $car -> setLuggage(5);
        $car -> setUser($user3);
        $car -> setPlaces(7);

        $manager->persist($car);
        $manager->flush();
    }

}
