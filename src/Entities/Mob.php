<?php

    namespace Emagia\Entities;


    use Emagia\Traits\Skill;

    class Mob extends Entity {
        use Skill;

        function __construct()
        {
            parent::setRandomName();

            $this->stats = [
                'hp'    => rand(60, 90),
                'str'   => rand(60, 90),
                'def'   => rand(40, 60),
                'speed' => rand(40, 60),
                'luck'  => rand(25, 40)
            ];

        }
    }