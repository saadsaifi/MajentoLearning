<?php

namespace MyCompany\RegistrationModule\Controller\Adminhtml\Admin1;

use Magento\Backend\App\Action;
use MyCompany\RegistrationModule\Model\RegistrationFactory;

class Edit extends Action
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
        $id = $this->getRequest()->getParam('id');
        $employee = $this->registrationFactory->create();

        if ($id) {
            $employee->load($id);
            if (!$employee->getId()) {
                $this->messageManager->addErrorMessage(__('This employee no longer exists.'));
                return $this->_redirect('registrationmodule/admin1/index');
            }
        }

        $this->_view->loadLayout();
        $this->_view->getLayout()->getBlock('employee_edit_form')->setData('employee', $employee);
        $this->_view->renderLayout();
    }
}
