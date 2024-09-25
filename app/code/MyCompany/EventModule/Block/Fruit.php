<?php
namespace MyCompany\EventModule\Block;

use Magento\Framework\View\Element\Template;
use MyCompany\EventModule\Model\Fruit as FruitModel;

class Fruit extends Template
{
protected $fruitModel;

public function __construct(
Template\Context $context,
FruitModel $fruitModel,
array $data = []
) {
$this->fruitModel = $fruitModel;
parent::__construct($context, $data);
}

public function getFruitNames()
{
return $this->fruitModel->getFruitNames(); // Fetch data from the Fruit model
}
}
