<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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
        $user = new User();
        $user -> setEmail('user@email.fr');
        $user -> setFirstname('User');
        $user -> setLastname('User');
        $user -> setPhone('0673643007');
        $user->setPassword($this->passwordEncoder->encodePassword($user, '123456789'));
        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $user -> setRoles(['ROLE_ADMIN']);
        $user -> setEmail('admin@email.fr');
        $user -> setFirstname('Admin');
        $user -> setLastname('Admin');
        $user -> setPhone('0673643007');
        $user->setPassword($this->passwordEncoder->encodePassword($user, '123456789'));

        $manager->persist($user);
        $manager->flush();
    }
}
