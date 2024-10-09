<?php

declare(strict_types=1);

namespace FooBar\MessageHandler;

use FooBar\Message\QuestionMessageQuery;
use FooBar\Shared\QuestionServiceInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class QuestionMessageHandler
{
    public function __construct(
        private QuestionServiceInterface $questionService,
    ) {
    }

    public function __invoke(QuestionMessageQuery $message): ?array
    {
        return $this->questionService->findAll(limit: $message->limit);
    }
}
