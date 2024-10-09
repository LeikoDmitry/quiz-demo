<?php

declare(strict_types=1);

namespace FooBar\Response;

use Doctrine\Common\Collections\Collection;
use FooBar\Entity\Answer;
use FooBar\Entity\Quiz;

readonly class QuizStatisticResponse
{
    public function __construct(private Quiz $quiz)
    {
    }

    public function getCorrectAnswers(): Collection
    {
        return $this->quiz->getAnswers()->filter(function (Answer $answer) {
            return $answer->isCorrect();
        });
    }

    public function getWrongAnswers(): Collection
    {
        return $this->quiz->getAnswers()->filter(function (Answer $answer) {
            return !$answer->isCorrect();
        });
    }

    public function getCountAnswers(): int
    {
        return \count($this->quiz->getAnswers());
    }

    public static function getStatistic(?Quiz $quiz): ?static
    {
        if (null === $quiz) {
            return null;
        }

        return new self($quiz);
    }
}
