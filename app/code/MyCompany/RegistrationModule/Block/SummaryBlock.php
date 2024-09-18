<?php
namespace MyCompany\RegistrationModule\Block;

use Magento\Framework\View\Element\Template;
use MyCompany\RegistrationModule\Model\RegistrationFactory;

class SummaryBlock extends Template
{
    protected $registrationFactory;

    public function __construct(
        Template\Context    $context,
        RegistrationFactory $registrationFactory,
        array               $data = []
    )
    {
        $this->registrationFactory = $registrationFactory;
        parent::__construct($context, $data);
    }

    public function getRegistrations()
    {
        $registration = $this->registrationFactory->create();
        return $registration->getCollection();
    }
}
