<?php
namespace MyCompany\RegistrationModule\Model\ResourceModel\Registration;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MyCompany\RegistrationModule\Model\Registration;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Dependency Initilization
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            Registration::class,
            \MyCompany\RegistrationModule\Model\ResourceModel\Registration::class
        );
    }
}

