<?php

namespace MyCompany\RegistrationModule\Controller\Adminhtml\Admin1;

use Magento\Backend\App\Action;
use MyCompany\RegistrationModule\Model\RegistrationFactory;

class Index extends Action
{
    protected $registrationFactory;

    public function __construct(
        Action\Context $context,
        RegistrationFactory $registrationFactory
    ) {
        parent::__construct($context);
        $this->registrationFactory = $registrationFactory;
    }

    public function execute()
    {
        $employeeCollection = $this->registrationFactory->create()->getCollection();  // Fetch all records
        $this->_view->loadLayout();
        $this->_view->getLayout()->getBlock('employee_list')->setData('employeeCollection', $employeeCollection); // Set collection to block
        $this->_view->renderLayout();
    }
}
