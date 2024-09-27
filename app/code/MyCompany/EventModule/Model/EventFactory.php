<?php
namespace MyCompany\EventModule\Model;

class EventFactory
{
    protected $objectManager;

    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function create(array $data = [])
    {
        return $this->objectManager->create('MyCompany\EventModule\Model\Event', $data);
    }
}
