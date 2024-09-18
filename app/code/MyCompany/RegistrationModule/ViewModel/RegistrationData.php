<?php

namespace MyCompany\RegistrationModule\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use MyCompany\RegistrationModule\Model\RegistrationFactory;

class RegistrationData implements ArgumentInterface
{
    protected $registrationFactory;

    public function __construct(
        RegistrationFactory $registrationFactory
    ) {
        $this->registrationFactory = $registrationFactory;
    }

    public function getRegistrations()
    {
        $registration = $this->registrationFactory->create();
        return $registration->getCollection();
    }

    public function getRoles()
    {
        $registration = $this->registrationFactory->create();
        return $registration->getCollection();
    }
}
