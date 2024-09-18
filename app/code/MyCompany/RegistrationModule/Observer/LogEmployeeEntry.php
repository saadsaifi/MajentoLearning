<?php
namespace MyCompany\RegistrationModule\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class LogEmployeeEntry implements ObserverInterface
{
protected $logger;

public function __construct(LoggerInterface $logger)
{
$this->logger = $logger;
}

public function execute(Observer $observer)
{

$employee = $observer->getData('employee');


$this->logger->info('New employee entry saved: ' . $employee->getName());
}
}
