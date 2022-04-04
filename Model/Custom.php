<?php

namespace Tam\BannerSlider\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Tam\BannerSlider\Api\Data\CustomExtensionInterface;
use Tam\BannerSlider\Api\Data\CustomInterface;

/**
 * Class Custom
 * @package Tam\BannerSlider\Model
 * phpcs:disable
 */
class Custom extends AbstractExtensibleModel implements CustomInterface
{
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const URL = 'url';
    const IMAGE = 'image';
    const GROUP = 'group_id';
    const CREATED_AT = 'created_at';

    protected function _construct()
    {
        $this->_init(\Tam\BannerSlider\Model\ResourceModel\Custom::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setId($id)
    {
        $this->setData(self::ID, $id);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->setData(self::NAME, $name);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->setData(self::DESCRIPTION, $description);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getView()
    {
        return $this->getData(self::URL);
    }

    /**
     * {@inheritdoc}
     */
    public function setView($view)
    {
        $this->setData(self::URL, $view);
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * {@inheritdoc}
     */
    public function setImage($image)
    {
        $this->setData(self::IMAGE, $image);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGroup()
    {
        return $this->getData(self::GROUP);
    }

    /**
     * {@inheritdoc}
     */
    public function setGroup($group_id)
    {
        $this->setData(self::GROUP, $group_id);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt($createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }
}
