<?php
namespace MyCompany\EventModule\Model;

use MyCompany\EventModule\Api\Data\EventInterface;
use MyCompany\EventModule\Api\EventRepositoryInterface;
use MyCompany\EventModule\Model\EventFactory;
use MyCompany\EventModule\Model\ResourceModel\Event as EventResource;
use Magento\Framework\Exception\NoSuchEntityException;

class EventRepository implements EventRepositoryInterface
{
    protected $eventFactory;
    protected $eventResource;

    public function __construct(
        EventFactory $eventFactory,
        EventResource $eventResource
    ) {
        $this->eventFactory = $eventFactory;
        $this->eventResource = $eventResource;
    }

    public function getById($id)
    {
        $event = $this->eventFactory->create();
        $this->eventResource->load($event, $id);
        if (!$event->getId()) {
            throw new NoSuchEntityException(__('Event with id "%1" does not exist.', $id));
        }
        return $event;
    }

    public function save(EventInterface $event)
    {
        $this->eventResource->save($event);
        return $event;
    }
    public function deleteById($id)
    {
        try {
            $event = $this->getById($id);
            $this->eventResource->delete($event);
            return "Record with id " . $id . " has been deleted.";
        } catch (\Exception $e) {
            throw new NoSuchEntityException(__('Unable to delete event with id %1', $id));
        }
    }
}
