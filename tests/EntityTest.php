<?php

    class EntityTest extends \PHPUnit\Framework\TestCase {

        public function testWeCanGetName()
        {
            $entity = new \Emagia\Entities\Entity();
            $entity->setName('Orderus');
            $this->assertEquals($entity->getName(),'Orderus');
        }

        public function testEqualityStats()
        {
            $entity = new \Emagia\Entities\Entity();

            $stats = [
                'hp'    => 0,
                'str'   => 0,
                'def'   => 0,
                'speed' => 0,
                'luck'  => 0
            ];

            $objectStats = $entity->getAllStats();

            $this->assertEquals($stats,$objectStats, "Default behaviour");
        }

        public function testRandomName()
        {

            $entity = new \Emagia\Entities\Entity();
            $entity->setRandomName();
            $names = [
                'Ghoragdush ',
                'Ambilge',
                'Neghed',
                'Ghorbash',
                'Epkagut',
                'Naghig',
                'Vargan',
                'Togugh',
            ];

            $this->assertContains($entity->getName(),$names);

        }


    }
