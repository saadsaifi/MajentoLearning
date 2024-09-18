<?php

namespace MyCompany\RegistrationModule\Controller\Adminhtml\Admin1;

use Magento\Backend\App\Action;

class NewEntry extends Action
{
    public function execute()
    {
        // Load the layout and render the new entry form
        $this->_view->loadLayout();
        $this->_view->getLayout()->getBlock('new_entry_form'); // Set up the form block
        $this->_view->renderLayout();
    }
}
