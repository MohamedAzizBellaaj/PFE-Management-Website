<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Traits\TimeStampTrait;

#[ORM\HasLifecycleCallbacks()]
#[ORM\Entity(repositoryClass:PersonRepository::class)]
class Person
{
    use TimeStampTrait;
    #[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column(type:'integer')]
private $id;

#[ORM\Column(type:'string', length:255)]
private $name;

#[ORM\Column(type:'integer')]
private $age;

function getId(): ?int
    {
    return $this->id;
}

function getName(): ?string
    {
    return $this->name;
}

function setName(string $name): self
    {
    $this->name = $name;

    return $this;
}

function getAge(): ?int
    {
    return $this->age;
}

function setAge(int $age): self
    {
    $this->age = $age;

    return $this;
}
}