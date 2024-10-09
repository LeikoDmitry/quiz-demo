<?php

declare(strict_types=1);

namespace FooBar\Service;

use Doctrine\ORM\EntityManagerInterface;
use FooBar\Entity\Answer;
use FooBar\Entity\Choice;
use FooBar\Entity\Quiz;
use FooBar\Repository\ChoiceRepository;
use FooBar\Shared\QuizServiceInterface;

readonly class QuizService implements QuizServiceInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ChoiceRepository $choiceRepository,
    ) {
    }

    public function getSelectedChoices(array $answerIds): array
    {
        $result = [];

        $choices = $this->choiceRepository->findBy(['id' => $answerIds]);

        /** @var Choice $choice */
        foreach ($choices as $choice) {
            $question = $choice->getQuestion();
            $questionId = $question->getId();

            if (!isset($result[$questionId])) {
                $result[$questionId] = [
                    'question' => $question,
                    'selected' => [],
                ];
            }

            $result[$questionId]['selected'][] = $choice;
        }

        return $result;
    }

    public function process(array $answers, ?\DateTimeImmutable $finished = null): Quiz
    {
        $selectedChoices = $this->getSelectedChoices($answers);
        $quiz = new Quiz($finished);

        foreach ($selectedChoices as $choice) {
            $quiz->addAnswer(new Answer(
                question: $choice['question'],
                choices: $choice['selected']),
            );
        }

        $this->entityManager->persist($quiz);
        $this->entityManager->flush();

        return $quiz;
    }
}
