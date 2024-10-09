<?php

declare(strict_types=1);

namespace FooBar\Controller;

use FooBar\Dto\AnswerDto;
use FooBar\Dto\QuizDto;
use FooBar\Entity\Quiz;
use FooBar\Message\QuestionMessageCommand;
use FooBar\Message\QuestionMessageQuery;
use FooBar\Message\QuizMessageQuery;
use FooBar\Response\QuizStatisticResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    /**
     * @throws ExceptionInterface
     */
    #[Route(path: '/', name: 'quiz_home', methods: ['GET'])]
    public function home(MessageBusInterface $bus): Response
    {
        $envelope = $bus->dispatch(new QuestionMessageQuery());
        $questions = $envelope->last(HandledStamp::class)->getResult();

        return $this->render(
            view: 'quiz/home.html.twig',
            parameters: compact('questions')
        );
    }

    #[Route(path: '/add', name: 'quiz_add', methods: ['POST'])]
    public function add(#[MapRequestPayload] AnswerDto $answerDto, MessageBusInterface $bus): Response
    {
        $envelope = $bus->dispatch(new QuestionMessageCommand(answers: $answerDto->choices));
        /** @var Quiz $quiz */
        $quiz = $envelope->last(HandledStamp::class)->getResult();

        return $this->redirectToRoute('quiz_statistic', ['id' => $quiz->getId()], Response::HTTP_MOVED_PERMANENTLY);
    }

    #[Route(path: '/statistic', name: 'quiz_statistic', methods: ['GET'])]
    public function statistic(#[MapQueryString] QuizDto $quizDto, MessageBusInterface $bus): Response
    {
        $envelope = $bus->dispatch(new QuizMessageQuery(id: $quizDto->id));
        $quiz = $envelope->last(HandledStamp::class)->getResult();

        $quizStatistic = QuizStatisticResponse::getStatistic($quiz);

        return $this->render(
            view: 'quiz/quiz_result.html.twig',
            parameters: compact('quizStatistic')
        );
    }
}
