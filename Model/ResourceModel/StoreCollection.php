<?php

declare(strict_types=1);

namespace Tam\BannerSlider\Model\ResourceModel;

use Tam\BannerSlider\Model\ResourceModel\Store as StoreResourceModel;

use Tam\BannerSlider\Model\Store as StoreModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class StoreCollection extends AbstractCollection

{

    /**

     * @inheritdoc

     */

    protected function _construct()

    {

        $this->_init(StoreModel::class, StoreResourceModel::class);
    }
}
