<?php

namespace App\Entity;

use App\Repository\QuizRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizRepository::class)]
class Quiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $QuizTitle = null;

    #[ORM\Column(length: 50)]
    private ?string $QuizType = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $QuizQuestion = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuizTitle(): ?string
    {
        return $this->QuizTitle;
    }

    public function setQuizTitle(string $QuizTitle): static
    {
        $this->QuizTitle = $QuizTitle;

        return $this;
    }

    public function getQuizType(): ?string
    {
        return $this->QuizType;
    }

    public function setQuizType(string $QuizType): static
    {
        $this->QuizType = $QuizType;

        return $this;
    }

    public function getQuizQuestion(): array
    {
        return $this->QuizQuestion;
    }

    public function setQuizQuestion(array $QuizQuestion): static
    {
        $this->QuizQuestion = $QuizQuestion;

        return $this;
    }
}
