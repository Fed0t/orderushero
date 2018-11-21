<?php

    namespace Emagia\Game;

    use Emagia\Helpers\Console;

    class BattleSimulator {

        private $attacker;
        private $defender;
        private $winner;
        private $console;
        private $totalTurns = 20;
        private $damage = 0;

        function __construct($mob, $hero)
        {
            $this->console = new Console();
            $this->attacker = $hero;
            $this->defender = $mob;
            $this->setPositions();
        }

        private function setPositions()
        {
            $attacker = $this->attacker;
            $defender = $this->defender;

            if ($this->defender->getStat('speed') > $this->attacker->getStat('speed')):
                $this->attacker = $defender;
                $this->defender = $attacker;
            endif;

            if ($this->defender->getStat('speed') == $this->attacker->getStat('speed'))
            {
                if ($this->defender->getStat('luck') > $this->attacker->getStat('luck')):
                    $this->attacker = $defender;
                    $this->defender = $attacker;
                endif;
            }
        }

        public function start()
        {
            echo 'Let`s battle begins between ' . $this->attacker->name . ' and ' . $this->defender->name . '.' . PHP_EOL;
            echo $this->attacker->name . ' attacks ' . $this->defender->name . ' first!' . PHP_EOL;
            $this->simulate();
        }

        private function simulate()
        {
            $turns = 1;
            while ($this->defender->getStat('hp') >= 0 && $turns <= $this->totalTurns)
            {
                echo $this->console->header('# Turn ' . $turns . ' - ' . $this->attacker->name . ' attacks! #') . PHP_EOL;

                $attacker = $this->attacker;
                $defender = $this->defender;
                $dodgeAttack = $this->defender->isLucky();
                $this->damageAmount();

                if ($dodgeAttack)
                {
                    echo $this->console->alert($this->defender->name . ' dodge the hit from ' . $this->attacker->name . '.') . PHP_EOL;
                }

                if (!$dodgeAttack)
                {
                    if ($this->defender->hasSpecialSkills()):
                        $defendSkill = $this->defender->defenseLuck();
                        if ($defendSkill != false):
                            echo $this->console->info('***' . $defendSkill['name'] . '***') . PHP_EOL;
                            switch ($defendSkill['key'])
                            {
                                case "magic_shield":
                                    $this->damage = $this->damage / 2;
                                    break;
                                case "first_aid":
                                    echo $this->console->info('Sorry, our Hero don`t have bandages.') . PHP_EOL;
                                    break;
                            }
                        endif;
                    endif;

                    if ($this->attacker->hasSpecialSkills()):
                        $attackSkill = $this->attacker->attackLuck();
                        if ($attackSkill != false):
                            echo $this->console->info('***' . $attackSkill['name'] . '***') . PHP_EOL;
                            switch ($attackSkill['key'])
                            {
                                case "rapid_strike":
                                    $this->logAttack();
                                    $this->meleeAttack();
                                    break;
                            }
                        endif;
                    endif;

                    $this->logAttack();
                    $this->meleeAttack();
                }

                $this->attacker = $defender;
                $this->defender = $attacker;
                $turns++;

                if ($this->checkHealth()):
                    break;
                endif;
            }

            echo $this->console->info($this->checkWinner()->name . ' wins. HOORAY!') . PHP_EOL;
        }

        private function checkWinner()
        {
            $winner = ($this->defender->getStat('hp') > $this->attacker->getStat('hp')) ? $this->defender : $this->attacker;

            if ($this->attacker->getStat('hp') <= 0):
                $winner = $this->defender;
            endif;

            if ($this->defender->getStat('hp') <= 0):
                $winner = $this->attacker;
            endif;

            $this->winner = $winner;

            return $this->winner;
        }

        private function meleeAttack()
        {
            $newHp = $this->defender->getStat('hp') - $this->damage;
            $this->defender->setStat('hp',$newHp);
        }

        private function damageAmount()
        {
            $this->damage = $this->attacker->getStat('str') - $this->defender->getStat('def');
        }

        private function logAttack()
        {
            echo $this->attacker->name . '(' . $this->attacker->stats['hp'] . ' hp)) damaged ' . $this->defender->name . '(' . $this->defender->stats['hp'] . ' hp) with ' . $this->damage . ' damage.' . PHP_EOL;
        }

        private function checkHealth()
        {
            if ($this->attacker->getStat('hp') <= 0 || $this->defender->getStat('hp') <= 0) return true;
        }


    }