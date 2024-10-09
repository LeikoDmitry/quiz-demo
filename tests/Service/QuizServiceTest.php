<?php

namespace App\Tests\Service;

use Doctrine\ORM\EntityManagerInterface;
use FooBar\Entity\Answer;
use FooBar\Entity\Choice;
use FooBar\Entity\Question;
use FooBar\Entity\Quiz;
use FooBar\Repository\ChoiceRepository;
use FooBar\Service\QuizService;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class QuizServiceTest extends TestCase
{

    /**
     * @throws Exception
     */
    public function testGetSelectedChoices(): void
    {
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $choiceRepository = $this->createMock(ChoiceRepository::class);
        $question = (new Question())->setId(1)->setTitle('Test');

        $a = (new Choice())->setId(1)->setTitle('lorem')->setQuestion($question);
        $b = (new Choice())->setId(2)->setTitle('ipsum')->setQuestion($question);
        $c = (new Choice())->setId(3)->setTitle('fooBar')->setQuestion($question);

        $choiceRepository->method('findBy')->willReturn([
            $a, $b, $c,
        ]);

        $quizService = new QuizService($entityManager, $choiceRepository);

        $this->assertEquals(
            [
                1 => ['question' => $question, 'selected' => [$a, $b, $c]],
            ],
            $quizService->getSelectedChoices([1, 2, 3])
        );
    }

    /**
     * @throws Exception
     */
    public function testProcessAnswer(): void
    {
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $choiceRepository = $this->createMock(ChoiceRepository::class);
        $question = (new Question())->setId(1)->setTitle('Test');

        $a = (new Choice())->setId(1)->setTitle('lorem')->setQuestion($question)->setCorrect(true);
        $b = (new Choice())->setId(2)->setTitle('ipsum')->setQuestion($question)->setCorrect(true);
        $c = (new Choice())->setId(3)->setTitle('fooBar')->setQuestion($question)->setCorrect(true);

        $choiceRepository->method('findBy')->willReturn([
            $a, $b, $c,
        ]);

        $quizService = new QuizService($entityManager, $choiceRepository);
        $actual = (new Quiz())->addAnswer(new Answer(question: $question, choices: [$a, $b, $c]));

        $this->assertEquals(
            $actual,
            $quizService->process([1, 2, 3])
        );
    }
}