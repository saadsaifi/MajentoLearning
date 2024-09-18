<?php

namespace MyCompany\RegistrationModule\Controller\Adminhtml\Admin1;

use Magento\Backend\App\Action;
use MyCompany\RegistrationModule\Model\RegistrationFactory;

class Delete extends Action
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
        if ($id) {
            try {
                $employee = $this->registrationFactory->create()->load($id);
                if ($employee->getId()) {
                    $employee->delete();
                    $this->messageManager->addSuccessMessage(__('Employee deleted successfully.'));
                } else {
                    $this->messageManager->addErrorMessage(__('Employee not found.'));
                }
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('Error while deleting employee.'));
            }
        }

        return $this->_redirect('registrationmodule/admin1/index');
    }
}
