<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez saisir le modèle de la voiture !")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fuel;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Veuillez saisir le nombre de places !")
     */
    private $Places;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gearBox;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Veuillez saisir le nombre de baggages supportés !")
     */
    private $luggage;

    /**
     * @ORM\OneToOne(targetEntity=CarImage::class, cascade={"persist", "remove"})
     */
    private $Image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->Places;
    }

    public function setPlaces(int $Places): self
    {
        $this->Places = $Places;

        return $this;
    }

    public function getGearBox(): ?string
    {
        return $this->gearBox;
    }

    public function setGearBox(string $gearBox): self
    {
        $this->gearBox = $gearBox;

        return $this;
    }

    public function getLuggage(): ?int
    {
        return $this->luggage;
    }

    public function setLuggage(int $luggage): self
    {
        $this->luggage = $luggage;

        return $this;
    }

    public function getImage(): ?CarImage
    {
        return $this->Image;
    }

    public function setImage(?CarImage $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
