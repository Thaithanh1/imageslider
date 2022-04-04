<?php

declare(strict_types=1);

namespace Tam\BannerSlider\Model;

use Tam\BannerSlider\Api\Data\GroupBannerInterface;

use Tam\BannerSlider\Api\GroupBannerRepositoryInterface;

use Tam\BannerSlider\Model\ResourceModel\GroupBanner as GroupBannerResourceModel;

use Tam\BannerSlider\Model\ResourceModel\GroupBannerCollection;

use Tam\BannerSlider\Model\ResourceModel\GroupBannerCollectionFactory;

use Magento\Framework\Api\Search\SearchCriteriaBuilder;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

use Magento\Framework\Api\SearchCriteriaInterface;

use Magento\Framework\Api\SearchResultsInterface;

use Magento\Framework\Api\SearchResultsInterfaceFactory;

use Magento\Framework\Exception\CouldNotSaveException;

class GroupBannerRepository implements GroupBannerRepositoryInterface

{

    /**

     * @var GroupBannerCollectionFactory

     */

    private $groupbannerCollectionFactory;

    /**

     * @var CollectionProcessorInterface

     */

    private $collectionProcessor;

    /**

     * @var SearchCriteriaBuilder

     */

    private $searchCriteriaBuilder;

    /**

     * @var SearchResultsInterfaceFactory

     */

    private $groupbannerSearchResultsInterfaceFactory;

    /**

     * @var GroupBannerResourceModel

     */

    private $groupbannerResourceModel;

    public function __construct(

        GroupBannerCollectionFactory $groupbannerCollectionFactory,

        CollectionProcessorInterface $collectionProcessor,

        SearchCriteriaBuilder $searchCriteriaBuilder,

        SearchResultsInterfaceFactory $groupbannerSearchResultsInterfaceFactory,

        GroupBannerResourceModel $groupbannerResourceModel

    ) {

        $this->groupbannerCollectionFactory = $groupbannerCollectionFactory;

        $this->collectionProcessor = $collectionProcessor;

        $this->searchCriteriaBuilder = $searchCriteriaBuilder;

        $this->groupbannerSearchResultsInterfaceFactory = $groupbannerSearchResultsInterfaceFactory;

        $this->groupbannerResourceModel = $groupbannerResourceModel;
    }

    /**

     * @inheritDoc

     */

    public function getList(SearchCriteriaInterface $searchCriteria = null): SearchResultsInterface
    {
        /** @var GroupBannerCollection $groupbannerCollection */
        $GroupBannerCollection = $this->groupbannerCollectionFactory->create();
        if (null === $searchCriteria) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $groupbannerCollection);
        }
        /** @var SearchResultsInterface $searchResult */
        $searchResult = $this->groupbannerSearchResultsInterfaceFactory->create();
        $searchResult->setItems($groupbannerCollection->getItems());
        $searchResult->setTotalCount($groupbannerCollection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);
        return $searchResult;
    }

    /**
     * @inheritDoc
     */

    public function save(GroupBannerInterface $GroupBanner): void
    {
        try {
            $this->groupbannerResourceModel->save($GroupBanner);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('Could not save Source'), $e);
        }
    }
}
