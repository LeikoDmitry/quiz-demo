<?php

declare(strict_types=1);

namespace FooBar\Message;

final readonly class QuestionMessageCommand
{
    public function __construct(
        public array $answers,
    ) {
    }
}
