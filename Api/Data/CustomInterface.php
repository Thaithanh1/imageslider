<?php

namespace Tam\BannerSlider\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface CustomInterface
 */
interface CustomInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getView();

    /**
     * @param string $view
     * @return $this
     */
    public function setView($view);
    /**
     * @return string
     */
    public function getImage();

    /**
     * @param string $view
     * @return $this
     */
    public function setImage($image);

    /**
     * @return int
     */
    public function getGroup();

    /**
     * @param int $group_id
     * @return $this
     */
    public function setGroup($group_id);

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);
}
