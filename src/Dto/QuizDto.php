<?php

declare(strict_types=1);

namespace FooBar\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class QuizDto
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Type('int')]
        public int $id,
    ) {
    }
}
