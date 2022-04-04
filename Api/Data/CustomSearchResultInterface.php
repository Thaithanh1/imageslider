<?php

namespace Tam\BannerSlider\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CustomSearchResultInterface
 * @package Tam\BannerSlider\Api\Data
 * phpcs:disable
 */
interface CustomSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * @return \Tam\BannerSlider\Api\Data\CustomInterface[]
     */
    public function getItems();

    /**
     * @param \Tam\BannerSlider\Api\Data\CustomInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
