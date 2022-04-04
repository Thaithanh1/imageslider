<?php

namespace Tam\BannerSlider\Model\ResourceModel\Custom;

/**
 * Class Collection
 * @package Tam\BannerSlider\Model\ResourceModel\Custom
 * phpcs:disable
 */

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected function _construct()
    {
        $this->_init(
            \Tam\BannerSlider\Model\Custom::class,
            \Tam\BannerSlider\Model\ResourceModel\Custom::class
        );
    }
}
