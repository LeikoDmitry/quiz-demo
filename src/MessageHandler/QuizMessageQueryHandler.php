<?php

declare(strict_types=1);

namespace FooBar\MessageHandler;

use FooBar\Entity\Quiz;
use FooBar\Message\QuizMessageQuery;
use FooBar\Repository\QuizRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class QuizMessageQueryHandler
{
    public function __construct(private QuizRepository $quizRepository)
    {
    }

    public function __invoke(QuizMessageQuery $message): ?Quiz
    {
        return $this->quizRepository->find(['id' => $message->id]);
    }
}
