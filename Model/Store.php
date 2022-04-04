<?php

declare(strict_types=1);

namespace Tam\BannerSlider\Model;

use Tam\BannerSlider\Api\Data\StoreInterface;

use Tam\BannerSlider\Model\ResourceModel\Store as StoreResourceModel;

use Magento\Framework\Model\AbstractExtensibleModel;

class Store extends AbstractExtensibleModel implements StoreInterface

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

    public function getUrl(): ?string

    {

        return $this->getData(self::URL);
    }

    public function setUrl(?string $url): void

    {

        $this->setData(self::URL, $url);
    }

    public function getImage(): ?string

    {

        return $this->getData(self::IMAGE);
    }

    public function setImage(?string $image): void

    {

        $this->setData(self::IMAGE, $image);
    }

    public function getStatus(): ?int

    {

        return $this->getData(self::STATUS);
    }

    public function setStatus(?int $status): void

    {

        $this->setData(self::STATUS, $status);
    }

    public function getStore_id(): ?int

    {

        return $this->getData(self::STORE_ID);
    }

    public function setStore_id(?int $store_id): void

    {

        $this->setData(self::STORE_ID, $store_id);
    }

    public function getOrder(): ?int

    {

        return $this->getData(self::ORDER);
    }

    public function setOrder(?int $order): void

    {

        $this->setData(self::ORDER, $order);
    }

    public function getGroup_id(): ?int

    {

        return $this->getData(self::GROUP_ID);
    }

    public function setGroup_id(?int $group_id): void

    {

        $this->setData(self::GROUP_ID, $group_id);
    }

    public function getDescription(): ?string

    {

        return $this->getData(self::DESCRIPTION);
    }

    public function setDescription(?string $description): void

    {

        $this->setData(self::DESCRIPTION, $description);
    }

    public function getName_Group(): ?string

    {

        return $this->getData(self::NAME_GROUP);
    }

    // public function setName_Group(?string $name): void

    // {

    //     $this->setData(self::NAME_GROUP, $name);
    // }
}
