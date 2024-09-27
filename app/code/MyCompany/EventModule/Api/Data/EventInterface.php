<?php
namespace MyCompany\EventModule\Api\Data;

interface EventInterface
{
    const EVENT_ID = 'event_id';
    const EVENT_NAME = 'event_name';
    const EVENT_DESCRIPTION = 'event_description';

    /**
     * Get event ID
     *
     * @return int
     */
    public function getEventId();

    /**
     * Set event ID
     *
     * @param int $eventId
     * @return \MyCompany\EventModule\Api\Data\EventInterface
     */
    public function setEventId($eventId);

    /**
     * Get event name
     *
     * @return string
     */
    public function getEventName();

    /**
     * Set event name
     *
     * @param string $eventName
     * @return \MyCompany\EventModule\Api\Data\EventInterface
     */
    public function setEventName($eventName);

    /**
     * Get event description
     *
     * @return string
     */
    public function getEventDescription();

    /**
     * Set event description
     *
     * @param string $eventDescription
     * @return \MyCompany\EventModule\Api\Data\EventInterface
     */
    public function setEventDescription($eventDescription);
}
