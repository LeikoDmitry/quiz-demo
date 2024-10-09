<?php

declare(strict_types=1);

namespace FooBar\DataFixtures;

class DataLoaderFixtures
{
    /**
     * @return array<int, array{}>
     */
    public static function loadQuestions(): array
    {
        return [
            [
                'id' => QuestionFixtures::ID_1,
                'title' => '1 + 1 =',
            ],
            [
                'id' => QuestionFixtures::ID_2,
                'title' => '2 + 2 =',
            ],
            [
                'id' => QuestionFixtures::ID_3,
                'title' => '3 + 3 =',
            ],
            [
                'id' => QuestionFixtures::ID_4,
                'title' => '4 + 4 =',
            ],
            [
                'id' => QuestionFixtures::ID_5,
                'title' => '5 + 5 =',
            ],
            [
                'id' => QuestionFixtures::ID_6,
                'title' => '6 + 6 =',
            ],
            [
                'id' => QuestionFixtures::ID_7,
                'title' => '7 + 7 =',
            ],
            [
                'id' => QuestionFixtures::ID_8,
                'title' => '8 + 8 =',
            ],
            [
                'id' => QuestionFixtures::ID_9,
                'title' => '9 + 9 =',
            ],
            [
                'id' => QuestionFixtures::ID_10,
                'title' => '10 + 10 =',
            ],
        ];
    }

    public static function loadChoices(): array
    {
        return [
            [
                'id' => 1,
                'question_id' => QuestionFixtures::ID_1,
                'title' => '3',
                'is_correct' => false,
            ],
            [
                'id' => 2,
                'question_id' => QuestionFixtures::ID_1,
                'title' => '2',
                'is_correct' => true,
            ],
            [
                'id' => 3,
                'question_id' => QuestionFixtures::ID_1,
                'title' => '0',
                'is_correct' => false,
            ],
            [
                'id' => 4,
                'question_id' => QuestionFixtures::ID_2,
                'title' => '4',
                'is_correct' => true,
            ],
            [
                'id' => 5,
                'question_id' => QuestionFixtures::ID_2,
                'title' => '3 + 1',
                'is_correct' => true,
            ],
            [
                'id' => 6,
                'question_id' => QuestionFixtures::ID_2,
                'title' => '10',
                'is_correct' => false,
            ],
            [
                'id' => 7,
                'question_id' => QuestionFixtures::ID_3,
                'title' => '1 + 5',
                'is_correct' => true,
            ],
            [
                'id' => 8,
                'question_id' => QuestionFixtures::ID_3,
                'title' => '1',
                'is_correct' => false,
            ],
            [
                'id' => 9,
                'question_id' => QuestionFixtures::ID_3,
                'title' => '6',
                'is_correct' => true,
            ],
            [
                'id' => 10,
                'question_id' => QuestionFixtures::ID_3,
                'title' => '2 + 4',
                'is_correct' => true,
            ],
            [
                'id' => 11,
                'question_id' => QuestionFixtures::ID_4,
                'title' => '8',
                'is_correct' => true,
            ],
            [
                'id' => 12,
                'question_id' => QuestionFixtures::ID_4,
                'title' => '4',
                'is_correct' => false,
            ],
            [
                'id' => 13,
                'question_id' => QuestionFixtures::ID_4,
                'title' => '0',
                'is_correct' => false,
            ],
            [
                'id' => 14,
                'question_id' => QuestionFixtures::ID_4,
                'title' => '0 + 8',
                'is_correct' => true,
            ],
            [
                'id' => 15,
                'question_id' => QuestionFixtures::ID_5,
                'title' => '6',
                'is_correct' => false,
            ],
            [
                'id' => 16,
                'question_id' => QuestionFixtures::ID_5,
                'title' => '18',
                'is_correct' => false,
            ],
            [
                'id' => 17,
                'question_id' => QuestionFixtures::ID_5,
                'title' => '10',
                'is_correct' => true,
            ],
            [
                'id' => 18,
                'question_id' => QuestionFixtures::ID_5,
                'title' => '9',
                'is_correct' => false,
            ],
            [
                'id' => 19,
                'question_id' => QuestionFixtures::ID_5,
                'title' => '0',
                'is_correct' => false,
            ],
            [
                'id' => 20,
                'question_id' => QuestionFixtures::ID_6,
                'title' => '3',
                'is_correct' => false,
            ],
            [
                'id' => 21,
                'question_id' => QuestionFixtures::ID_6,
                'title' => '9',
                'is_correct' => false,
            ],
            [
                'id' => 22,
                'question_id' => QuestionFixtures::ID_6,
                'title' => '0',
                'is_correct' => false,
            ],
            [
                'id' => 23,
                'question_id' => QuestionFixtures::ID_6,
                'title' => '12',
                'is_correct' => true,
            ],
            [
                'id' => 24,
                'question_id' => QuestionFixtures::ID_6,
                'title' => '7 + 5',
                'is_correct' => true,
            ],
            [
                'id' => 25,
                'question_id' => QuestionFixtures::ID_7,
                'title' => '5',
                'is_correct' => false,
            ],
            [
                'id' => 26,
                'question_id' => QuestionFixtures::ID_7,
                'title' => '14',
                'is_correct' => true,
            ],
            [
                'id' => 27,
                'question_id' => QuestionFixtures::ID_8,
                'title' => '16',
                'is_correct' => true,
            ],
            [
                'id' => 28,
                'question_id' => QuestionFixtures::ID_8,
                'title' => '12',
                'is_correct' => false,
            ],
            [
                'id' => 29,
                'question_id' => QuestionFixtures::ID_8,
                'title' => '9',
                'is_correct' => false,
            ],
            [
                'id' => 30,
                'question_id' => QuestionFixtures::ID_8,
                'title' => '5',
                'is_correct' => false,
            ],
            [
                'id' => 31,
                'question_id' => QuestionFixtures::ID_9,
                'title' => '18',
                'is_correct' => true,
            ],
            [
                'id' => 32,
                'question_id' => QuestionFixtures::ID_9,
                'title' => '9',
                'is_correct' => false,
            ],
            [
                'id' => 33,
                'question_id' => QuestionFixtures::ID_9,
                'title' => '17 + 1',
                'is_correct' => true,
            ],
            [
                'id' => 34,
                'question_id' => QuestionFixtures::ID_9,
                'title' => '2 + 16',
                'is_correct' => true,
            ],
            [
                'id' => 35,
                'question_id' => QuestionFixtures::ID_10,
                'title' => '0',
                'is_correct' => false,
            ],
            [
                'id' => 36,
                'question_id' => QuestionFixtures::ID_10,
                'title' => '2',
                'is_correct' => false,
            ],
            [
                'id' => 37,
                'question_id' => QuestionFixtures::ID_10,
                'title' => '8',
                'is_correct' => false,
            ],
            [
                'id' => 38,
                'question_id' => QuestionFixtures::ID_10,
                'title' => '20',
                'is_correct' => true,
            ],
        ];
    }
}
