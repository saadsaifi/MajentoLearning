<?php
namespace MyCompany\EventModule\Model;

class Product extends \Magento\Catalog\Model\Product{

    public function getName()
    {
        return 'Sample Products';
    }

}
