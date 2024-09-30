<?php

namespace Practice\SampleModule\Controller\Adminhtml\Item;

use Practice\SampleModule\Model\ItemFactory;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    private $itemFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ItemFactory $itemFactory
    ) {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {	
		/** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
		
        $data = $this->getRequest()->getPostValue()['general'];

		$model = $this->itemFactory->create();
		
		if (isset($data['entity_id'])) {
			try {
				$id = $data['entity_id'];
				$model = $model->load($id);
			} catch (LocalizedException $e) {
				$this->messageManager->addErrorMessage(__('This page no longer exists.'));
				return $resultRedirect->setPath('*/*/');
			}
		}
		
		$model->setData($data);
		$model->save();
		
        return $this->resultRedirectFactory->create()->setPath('practice/index/index');
    }
}
