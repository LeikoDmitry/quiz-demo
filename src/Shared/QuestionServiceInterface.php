<?php

declare(strict_types=1);

namespace FooBar\Shared;

interface QuestionServiceInterface
{
    public function findAll(int $limit): ?array;
}
