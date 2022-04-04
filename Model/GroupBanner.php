<?php

declare(strict_types=1);

namespace Tam\BannerSlider\Model;

use Tam\BannerSlider\Api\Data\StoreInterface;

use Tam\BannerSlider\Model\ResourceModel\Store as StoreResourceModel;

use Magento\Framework\Model\AbstractExtensibleModel;

class GroupBanner extends AbstractExtensibleModel implements GroupBannerInterface

{

    protected function _construct()

    {

        $this->_init(StoreResourceModel::class);
    }

    public function getName(): ?string

    {

        return $this->getData(self::NAME);
    }

    public function setName(?string $name): void

    {

        $this->setData(self::NAME, $name);
    }
}
