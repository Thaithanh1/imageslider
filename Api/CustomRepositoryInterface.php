<?php

namespace Tam\BannerSlider\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Tam\BannerSlider\Api\Data\CustomInterface;

/**
 * Interface CustomManagementInterface
 */
interface CustomRepositoryInterface
{
    /**
     * @param int $id
     * @return \Tam\BannerSlider\Api\Data\CustomInterface
     */
    public function getById($id);

    /**
     * @param \Tam\BannerSlider\Api\Data\CustomInterface $tambanner
     * @return \Tam\BannerSlider\Api\Data\CustomInterface
     */
    public function save(CustomInterface $tambanner);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Tam\BannerSlider\Api\Data\CustomSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
