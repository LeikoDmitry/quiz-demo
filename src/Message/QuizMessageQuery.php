<?php

declare(strict_types=1);

namespace FooBar\Message;

final readonly class QuizMessageQuery
{
    public function __construct(
        public int $id,
    ) {
    }
}
