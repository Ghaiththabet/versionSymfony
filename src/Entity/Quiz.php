<?php

namespace App\Entity;

use App\Repository\QuizRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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


    #[ORM\OneToOne(mappedBy: 'quiz', cascade: ['persist', 'remove'])]
    private ?Cours $cours = null;

    #[ORM\Column(type: Types::JSON)]
    private array $Question = [];

    #[ORM\Column]
    private ?int $Resultat = null;


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

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(Cours $cours): static
    {
        // set the owning side of the relation if necessary
        if ($cours->getQuiz() !== $this) {
            $cours->setQuiz($this);
        }

        $this->cours = $cours;

        return $this;
    }

    public function getQuestion(): array
    {
        return $this->Question;
    }

    public function setQuestion(array $Question): static
    {
        $this->Question = $Question;

        return $this;
    }

    public function getResultat(): ?int
    {
        return $this->Resultat;
    }

    public function setResultat(int $Resultat): static
    {
        $this->Resultat = $Resultat;

        return $this;
    }

}
