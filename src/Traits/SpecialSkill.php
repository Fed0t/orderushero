<?php

    namespace Emagia\Traits;

    trait SpecialSkill {

        public $specialSkills = [
            'attack'  => [
                [
                    'key'         => 'rapid_strike',
                    'name'        => 'Rapid Strike',
                    'description' => 'Strike twice while it’s his turn to attack.
                                  There’s a 10% chance he’ll use this skill every time he attacks',
                    'chance'      => 10,
                    'type'        => 'passive'
                ],
            ],
            'defense' => [

                ['key'         => 'magic_shield',
                 'name'        => 'Magic Shield',
                 'description' => 'Takes only half of the usual damage when an enemy attacks,
                                  there’s a 20% change he’ll use this skill every time he defends',
                 'chance'      => 20,
                 'type'        => 'passive'
                ],

                ['key'         => 'first_aid',
                 'name'        => 'First Aid',
                 'description' => 'Heal your body with bandages.',
                 'chance'      => 0,
                 'type'        => 'passive'
                ]

            ]
        ];

    }
