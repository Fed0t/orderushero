<?php

    namespace Emagia\Entities;

    use Emagia\Traits\Skill;
    use Emagia\Traits\SpecialSkill;

    class Hero extends Entity {

        use Skill, SpecialSkill;

        function __construct()
        {

            $this->stats = [
                'hp'    => rand(70, 100),
                'str'   => rand(70, 80),
                'def'   => rand(45, 55),
                'speed' => rand(40, 50),
                'luck'  => rand(10, 30)
            ];

        }


        public function defenseLuck()
        {
            foreach($this->specialSkills['defense'] as $name => $skill){
                $randomLuck = rand(0, 100);
                if (($skill['chance'] > $randomLuck) && $skill['type'] == 'passive')
                {
                    return $skill;
                }
            }
            return false;
        }

        public function attackLuck()
        {
            foreach($this->specialSkills['attack'] as $skill){
                $randomLuck = rand(0, 100);
                if (($skill['chance'] > $randomLuck) && $skill['type'] == 'passive')
                {
                    return $skill;
                }
            }
            return false;
        }


    }