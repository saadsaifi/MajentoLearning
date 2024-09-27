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
     * @param int $id
     * @return string
     */
    public function save($id);


    /**
     * Delete event by ID
     * @param int $id
     * @return bool true on success
     */
    public function deleteById($id);
}
