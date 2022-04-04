<?php

namespace Tam\BannerSlider\Model\ResourceModel;

/**
 * Class Custom
 * @package Tam\BannerSlider\Model\ResourceModel
 * phpcs:disable
 */
class Custom extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('tam_banners_slider', 'id');
    }
}
