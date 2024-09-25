<?php
namespace MyCompany\EventModule\Plugin;

use MyCompany\EventModule\Model\Fruit;

class FruitPlugin
{
    public function afterGetFruitNames(Fruit $subject, array $result)
    {
        foreach ($result as &$fruit) {
            $fruit .= ' on sale';
        }

        return $result;
    }
}
