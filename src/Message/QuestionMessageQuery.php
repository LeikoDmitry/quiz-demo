<?php

declare(strict_types=1);

namespace FooBar\Message;

final readonly class QuestionMessageQuery
{
    public function __construct(
        public readonly int $limit = 100,
    ) {
    }
}
