<?php

declare(strict_types=1);

namespace FooBar\Shared;

use FooBar\Entity\Quiz;

interface QuizServiceInterface
{
    public function process(array $answers, ?\DateTimeImmutable $finished = null): Quiz;
}
