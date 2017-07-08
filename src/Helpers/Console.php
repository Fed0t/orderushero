<?php

    namespace Emagia\Helpers;

    use Emagia\Helpers\Colors;

    class Console {

        public $colors;

        function __construct()
        {
            $this->colors = new Colors();
        }

        public static function debug($var)
        {
            $debug = var_dump($var);
            echo $debug;
            exit();
        }

        public function info($string)
        {
            return $this->colors->getColoredString($string, 'white', 'green');
        }

        public function header($string)
        {
            return $this->colors->getColoredString($string, 'white', 'red');
        }

        public function nice($string)
        {
            return $this->colors->getColoredString($string, 'white', 'magenta');
        }

        public function alert($string)
        {
            return $this->colors->getColoredString($string, 'white', 'cyan');
        }
    }
