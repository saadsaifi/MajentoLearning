<?php

namespace MyCompany\EventModule\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Exception\LocalizedException;

class CheckCartWeight implements ObserverInterface
{
    protected $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function execute(Observer $observer)
    {
        $cart = $observer->getEvent()->getCart();


        $maxWeight = $this->scopeConfig->getValue('weight_management/weight_group/weight_field', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if (!$maxWeight) {
            return;
        }

        $cartItems = $cart->getQuote()->getAllItems();
        $totalWeight = 0;

        foreach ($cartItems as $item) {
            $product = $item->getProduct();
            $totalWeight += $product->getWeight() * $item->getQty();
        }

        if ($totalWeight > $maxWeight) {
            throw new LocalizedException(__('You have reached the maximum weight allowed for the cart.'));
        }
    }
}
