<?php

declare(strict_types=1);

namespace FooBar\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use FooBar\Entity\Choice;

/**
 * @extends ServiceEntityRepository<Choice>
 */
class ChoiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Choice::class);
    }
}
