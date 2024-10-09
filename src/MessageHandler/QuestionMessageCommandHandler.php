<?php

declare(strict_types=1);

namespace FooBar\MessageHandler;

use FooBar\Entity\Quiz;
use FooBar\Message\QuestionMessageCommand;
use FooBar\Shared\QuizServiceInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class QuestionMessageCommandHandler
{
    public function __construct(private QuizServiceInterface $quizService)
    {
    }

    public function __invoke(QuestionMessageCommand $message): Quiz
    {
        return $this->quizService->process($message->answers, new \DateTimeImmutable());
    }
}
