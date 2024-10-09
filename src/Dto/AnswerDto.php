<?php

declare(strict_types=1);

namespace FooBar\Dto;

use Symfony\Component\Validator\Constraints as Assert;

readonly class AnswerDto
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Type('array')]
        public array $choices,
    ) {
    }
}
