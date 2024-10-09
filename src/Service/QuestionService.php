<?php

declare(strict_types=1);

namespace FooBar\Service;

use FooBar\Repository\QuestionRepository;
use FooBar\Shared\QuestionServiceInterface;

readonly class QuestionService implements QuestionServiceInterface
{
    public function __construct(private QuestionRepository $questionRepository)
    {
    }

    public function findAll(int $limit): ?array
    {
        return $this->questionRepository->findAllQuestions($limit);
    }
}
