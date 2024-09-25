<?php
namespace MyCompany\EventModule\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
protected $pageFactory;

public function __construct(
Context $context,
PageFactory $pageFactory
) {
$this->pageFactory = $pageFactory;
parent::__construct($context);
}

public function execute()
{
// Create the page result object
$resultPage = $this->pageFactory->create();

return $resultPage; // Return the page layout
}
}
