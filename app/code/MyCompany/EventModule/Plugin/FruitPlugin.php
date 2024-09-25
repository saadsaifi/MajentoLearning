<?php
namespace MyCompany\EventModule\Plugin;

use MyCompany\EventModule\Model\Fruit;

class FruitPlugin
{
    public function afterGetFruitNames(Fruit $subject, array $result)
    {
        $result[] = "Peach";
        return $result;
    }
}
