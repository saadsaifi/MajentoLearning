<?php

namespace MyCompany\EventModule\Plugin;
use Magento\Catalog\Pricing\Render\FinalPriceBox as FinalPrice;
class ProductPricePlugin
{

    public function afterRenderAmount(FinalPrice $subject, $result)
    {
// Append the custom text to the price
        $customText = __(' (incl of tax)');
        return $result . $customText;
    }
}
