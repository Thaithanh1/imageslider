<?php

declare(strict_types=1);

namespace Tam\BannerSlider\Model\ResourceModel;

use Tam\BannerSlider\Model\ResourceModel\GroupBanner as GroupBannerResourceModel;

use Tam\BannerSlider\Model\GroupBanner as GroupBannerModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class GroupBannerCollection extends AbstractCollection

{

    /**

     * @inheritdoc

     */

    protected function _construct()

    {

        $this->_init(GroupBannerModel::class, GroupBannerResourceModel::class);
    }
}
