<?php

    namespace Emagia;

    use Emagia\Entities\Hero;
    use Emagia\Entities\Mob;
    use Emagia\Helpers\Console;
    use Emagia\Game\BattleSimulator;

    class OrderusHero {

        public static function welcome()
        {
            echo '   ____           __                        __  __              ' . PHP_EOL;
            echo '  / __ \_________/ /__  _______  _______   / / / /__  _________ ' . PHP_EOL;
            echo ' / / / / ___/ __  / _ \/ ___/ / / / ___/  / /_/ / _ \/ ___/ __ \\' . PHP_EOL;
            echo '/ /_/ / /  / /_/ /  __/ /  / /_/ (__  )  / __  /  __/ /  / /_/ /' . PHP_EOL;
            echo '\____/_/   \__,_/\___/_/   \__,_/____/  /_/ /_/\___/_/   \____/ ' . PHP_EOL;
            echo '                                                                ' . PHP_EOL;
        }

        public function spawnMob()
        {
            return new Mob();
        }

        public function spawnHero()
        {
            $hero = new Hero();
            $console = new Console();
            $hero->setName('Orderus');
            echo $console->nice('Hello, my name is ' . $hero->name . ' and I`m hero in Emagia .Let`s kill something in this bloody land !!') . PHP_EOL;

            return $hero;
        }

        public function battle()
        {

            $this->welcome();
            $hero = $this->spawnHero();
            $mob = $this->spawnMob();

            $battle = new BattleSimulator($hero, $mob);
            $battle->start();
        }


    }