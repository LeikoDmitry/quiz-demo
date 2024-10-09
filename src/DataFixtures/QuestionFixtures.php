<?php

declare(strict_types=1);

namespace FooBar\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use FooBar\Entity\Question;

class QuestionFixtures extends Fixture
{
    public const int ID_1 = 1;
    public const int ID_2 = 2;
    public const int ID_3 = 3;
    public const int ID_4 = 4;
    public const int ID_5 = 5;
    public const int ID_6 = 6;
    public const int ID_7 = 7;
    public const int ID_8 = 8;
    public const int ID_9 = 9;
    public const int ID_10 = 10;

    public function load(ObjectManager $manager): void
    {
        foreach (DataLoaderFixtures::loadQuestions() as $data) {
            $entity = (new Question())->setId($data['id'])->setTitle($data['title']);
            $manager->persist($entity);

            $this->addReference('question_'.$data['id'], $entity);
        }

        $manager->flush();
    }
}
