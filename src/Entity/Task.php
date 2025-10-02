<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'task')]
#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Column(type: Types::BIGINT)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private ?string $id = null;

    #[ORM\Column(length: 50)]
    private ?string $title = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name:'isCompleted', type: Types::BOOLEAN, options: ["default" => 0])]
    private ?int $isCompleted = 0;

    #[ORM\Column(name:'createdAt', type: Types::DATETIME_MUTABLE, nullable: true, options: ["default" => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(name:'createdBy', length: 50)]
    private ?string $createdBy = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId( string $id )
    {
        $this->id = $id;
        
        return $this;
    }
    
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIscompleted(): ?int
    {
        return $this->isCompleted;
    }

    public function setIscompleted(int $isCompleted): static
    {
        $this->isCompleted = $isCompleted;

        return $this;
    }

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedat(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedby(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedby(string $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }
}
