<?php
namespace MyCompany\EventModule\Api;

use MyCompany\EventModule\Api\Data\EventInterface;

interface EventRepositoryInterface
{
    /**
     * Get event by ID
     * @param int $id
     * @return \MyCompany\EventModule\Api\Data\EventInterface
     */
    public function getById($id);

    /**
     * Save event
     * @param \MyCompany\EventModule\Api\Data\EventInterface $event
     * @return \MyCompany\EventModule\Api\Data\EventInterface
     */
    public function save(EventInterface $event);


    /**
     * Delete event by ID
     * @param int $id
     * @return bool true on success
     */
    public function deleteById($id);
}
