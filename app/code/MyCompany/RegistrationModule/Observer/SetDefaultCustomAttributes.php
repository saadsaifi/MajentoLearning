<?php
declare(strict_types=1);

namespace MyCompany\RegistrationModule\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class SetDefaultCustomAttributes implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Constructor
     *
     * @param LoggerInterface $logger
     */
    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * Execute observer
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        try {
            $product = $observer->getEvent()->getProduct();
            $product->setData('sample_yes_no', 1);
            $product->setData('sample_text_attribute', 'Default text value');
        } catch (\Exception $e) {
            // Log any exception
            $this->logger->critical($e->getMessage());
        }
    }
}
