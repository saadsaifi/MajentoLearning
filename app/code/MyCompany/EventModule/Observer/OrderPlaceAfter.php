<?php

namespace MyCompany\EventModule\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Sales\Model\Order;

class OrderPlaceAfter implements ObserverInterface
{
    protected $logger;
    protected $orderRepository;

    public function __construct(LoggerInterface $logger, \Magento\Sales\Api\OrderRepositoryInterface $orderRepository)
    {
        $this->logger = $logger;
        $this->orderRepository = $orderRepository;
    }

    public function execute(Observer $observer)
    {

        $order = $observer->getEvent()->getOrder();

        if ($order instanceof Order) {
            $orderId = $order->getIncrementId();
            $statusCode = $order->getStatus();
            $totalAmount = $order->getGrandTotal();

            $this->logger->info('Order placed. Order ID: ' . $orderId);
            $this->logger->info('Order Status Code: ' . $statusCode);
            $this->logger->info('Total Order Amount: ' . $totalAmount);
        } else {
            $this->logger->info('Order object is not found or not instance of Order.');
        }

    }
}
