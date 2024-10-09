<?php

declare(strict_types=1);

namespace FooBar\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use FooBar\Entity\Question;

/**
 * @extends ServiceEntityRepository<Question>
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

    public function findAllQuestions(int $limit): array
    {
        return $this->findBy(criteria: [], limit: $limit);
    }
}
