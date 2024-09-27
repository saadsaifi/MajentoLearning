<?php
namespace MyCompany\EventModule\Model;

use MyCompany\EventModule\Api\Data\EventInterface;
use Magento\Framework\Model\AbstractModel;

class Event extends AbstractModel implements EventInterface
{
    protected function _construct()
    {
        $this->_init(\MyCompany\EventModule\Model\ResourceModel\Event::class);
    }

    public function getEventId()
    {
        return $this->getData(self::EVENT_ID);
    }

    public function setEventId($eventId)
    {
        return $this->setData(self::EVENT_ID, $eventId);
    }

    public function getEventName()
    {
        return $this->getData(self::EVENT_NAME);
    }

    public function setEventName($eventName)
    {
        return $this->setData(self::EVENT_NAME, $eventName);
    }

    public function getEventDescription()
    {
        return $this->getData(self::EVENT_DESCRIPTION);
    }

    public function setEventDescription($eventDescription)
    {
        return $this->setData(self::EVENT_DESCRIPTION, $eventDescription);
    }
}
