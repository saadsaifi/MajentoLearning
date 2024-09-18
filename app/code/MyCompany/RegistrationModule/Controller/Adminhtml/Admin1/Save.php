<?php
namespace MyCompany\RegistrationModule\Controller\Adminhtml\Admin1;

use Magento\Backend\App\Action;
use MyCompany\RegistrationModule\Model\RegistrationFactory;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class Save extends Action
{
protected $registrationFactory;
protected $eventManager;
protected $filesystem;

public function __construct(
Action\Context      $context,
RegistrationFactory $registrationFactory,
ManagerInterface    $eventManager,
DirectoryList       $directoryList
)
{
parent::__construct($context);
$this->registrationFactory = $registrationFactory;
$this->eventManager = $eventManager;
$this->directoryList = $directoryList;
}

public function execute()
{
$data = $this->getRequest()->getPostValue();
$id = isset($data['id']) ? $data['id'] : null;

if ($id) {
$employee = $this->registrationFactory->create()->load($id);
} else {
$employee = $this->registrationFactory->create();
}

// Set employee name and email
$employee->setName($data['name']);
$employee->setEmail($data['email']);

// Check if an image was uploaded and set the image path
if (isset($data['image'][0]['file'])) {
$imagePath = $data['image'][0]['file'];
$employee->setImage($imagePath);
}

// Save the employee data
$employee->save();

$this->eventManager->dispatch('employee_new_entry_name', ['employee' => $employee]);

if ($id) {
$this->messageManager->addSuccessMessage(__('The record has been updated.'));
} else {
$this->messageManager->addSuccessMessage(__('New employee has been added.'));
}

return $this->_redirect('registrationmodule/admin1/index');
}
}
