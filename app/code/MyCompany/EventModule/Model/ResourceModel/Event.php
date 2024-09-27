<?php
namespace MyCompany\EventModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Event extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('event_table', 'event_id');
    }
}
