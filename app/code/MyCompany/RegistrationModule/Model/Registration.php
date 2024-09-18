<?php
namespace MyCompany\RegistrationModule\Model;

use Magento\Framework\Model\AbstractModel;

class Registration extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('MyCompany\RegistrationModule\Model\ResourceModel\Registration');
    }
}
