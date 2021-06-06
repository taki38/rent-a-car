<?php

namespace App\Entity;

use App\Repository\CarImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=CarImageRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class CarImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    private $file;


    private $path;




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


    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file): void
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

    /**
     * @ORM\PreFlush()
     */
    public function handle()
    {
        if($this->file === null) {
            return;
        }
        if($this->id) {
            unlink($this->path.'/'.$this->name);
        }
        $name = $this->createName();
        $this->setName($name);
        $this->file->move($this->path, $name);

    }

    private function createName()
    {
        return md5(uniqid()).$this->file->getClientOriginalName().'.'.$this->file->guessExtension();
    }
}
