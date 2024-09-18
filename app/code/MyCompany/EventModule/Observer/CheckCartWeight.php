<?php

namespace MyCompany\EventModule\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Checkout\Model\Cart as CheckoutCart;
use Magento\Framework\Exception\LocalizedException;

class CheckCartWeight implements ObserverInterface
{
    protected $scopeConfig;
    protected $cart;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        CheckoutCart $cart
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->cart = $cart;
    }

    public function execute(Observer $observer)
    {
        $maxWeight = $this->scopeConfig->getValue('weight_management/weight_group/weight_field', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if (!$maxWeight) {
            return;
        }

        $cartItems = $this->cart->getQuote()->getAllItems();
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
