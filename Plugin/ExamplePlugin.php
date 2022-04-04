<?php

namespace Slide\SlideBanner\Plugin;

// use Magento\Catalog\Api\Data\ProductInterface;

class ExamplePlugin
{
    // public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    // {
    //     return'|'. $result. '|';
    // }
    public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name)
    {
        $name = "upadtename";
        return [$name];
    }
}
