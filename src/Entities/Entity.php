<?php

namespace Emagia\Entities;

class Entity
{
    public $name;

    public $stats = [
        'hp' => 0,
        'str' => 0,
        'def' => 0,
        'speed' => 0,
        'luck' => 0
    ];

    public function setRandomName()
    {
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
        $this->setName($names[rand(0, count($names) - 1)]);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStat($key)
    {
        return $this->stats[$key];
    }

    public function setStat($key, $value)
    {
        $this->stats[$key] = $value;
    }

    public function getAllStats()
    {
        return $this->stats;
    }

    public function isLucky()
    {
        $randomLuck = rand(0, 100);
        return  ($this->stats['luck'] > $randomLuck) ? true :false;
    }

    public function hasSpecialSkills()
    {
        return (isset($this->specialSkills)) ? true : false;
    }
}