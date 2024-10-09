<?php

declare(strict_types=1);

namespace FooBar\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use FooBar\Repository\AnswerRepository;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private bool $isCorrect;

    #[ORM\ManyToOne(cascade: ['persist'], inversedBy: 'answers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Quiz $quiz = null;

    #[ORM\ManyToOne(inversedBy: 'answers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Question $question;

    /**
     * @var Collection<int, Choice>
     */
    #[ORM\ManyToMany(targetEntity: Choice::class, inversedBy: 'answers')]
    private Collection $choices;

    public function __construct(Question $question, array $choices)
    {
        $this->question = $question;
        $this->choices = new ArrayCollection($choices);
        $this->isCorrect = $this->isCorrectAnswer();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function isCorrect(): ?bool
    {
        return $this->isCorrect;
    }

    public function setCorrect(bool $isCorrect): static
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    public function getQuiz(): ?Quiz
    {
        return $this->quiz;
    }

    public function setQuiz(?Quiz $quiz): static
    {
        $this->quiz = $quiz;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): static
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return Collection<int, Choice>
     */
    public function getChoices(): Collection
    {
        return $this->choices;
    }

    public function addChoice(Choice $choice): static
    {
        if (!$this->choices->contains($choice)) {
            $this->choices->add($choice);
        }

        return $this;
    }

    public function removeChoice(Choice $choice): static
    {
        $this->choices->removeElement($choice);

        return $this;
    }

    private function isCorrectAnswer(): bool
    {
        $isRight = false;

        /** @var Choice $choice */
        foreach ($this->choices as $choice) {
            $isRight = true === $choice->isCorrect();
        }

        return $isRight;
    }
}
