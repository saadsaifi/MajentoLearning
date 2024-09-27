<?php
namespace MyCompany\EventModule\Model\ResourceModel\Event;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MyCompany\EventModule\Model\Event;
use MyCompany\EventModule\Model\ResourceModel\Event as EventResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Event::class, EventResource::class);
    }
}
