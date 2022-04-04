<?php

declare(strict_types=1);

namespace Tam\BannerSlider\Api;

use Tam\BannerSlider\Api\Data\GroupBannerInterface;

use Magento\Framework\Api\SearchCriteriaInterface;

use Magento\Framework\Api\SearchResultsInterface;

/**

 * @api

 */

interface GroupBannerRepositoryInterface

{

    /**

     * Save the GroupBanner data.

     *

     * @param \Magento\InventoryApi\Api\Data\SourceInterface $source

     * @return void

     * @throws \Magento\Framework\Exception\CouldNotSaveException

     */

    public function save(GroupBannerInterface $groupbanner): void;

    /**

     * Find groupbanners by given SearchCriteria

     * SearchCriteria is not required because load all groupbanners is useful case

     *

     * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria

     * @return \Magento\Framework\Api\SearchResultsInterface

     */

    public function getList(SearchCriteriaInterface $searchCriteria = null): SearchResultsInterface;
}
