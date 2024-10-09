<?php

declare(strict_types=1);

namespace FooBar\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use FooBar\Entity\Choice;

class ChoiceFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [
            QuestionFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        foreach (DataLoaderFixtures::loadChoices() as $data) {
            $entity = (new Choice())
                ->setId($data['id'])
                ->setTitle($data['title'])
                ->setCorrect($data['is_correct'])
                ->setQuestion($this->getReference('question_'.$data['question_id']))
            ;
            $manager->persist($entity);
            $manager->flush();
        }
    }
}
