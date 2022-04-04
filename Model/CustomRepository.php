<?php

namespace Tam\BannerSlider\Model;

use Tam\BannerSlider\Api\Data\CustomInterface;
use Tam\BannerSlider\Model\ResourceModel\Custom\Collection;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Tam\BannerSlider\Api\Data\CustomSearchResultInterface;
use Tam\BannerSlider\Api\Data\CustomSearchResultInterfaceFactory;
use Tam\BannerSlider\Api\CustomRepositoryInterface;
use Tam\BannerSlider\Model\ResourceModel\Custom\CollectionFactory as CustomCollectionFactory;

/**
 * Class CustomManagement
 * @package Tam\BannerSlider\Model
 * phpcs:disable
 */
class CustomRepository implements \Tam\BannerSlider\Api\CustomRepositoryInterface
{
    /**
     * @var \Tam\BannerSlider\Model\CustomFactory
     */
    protected $customFactory;

    /**
     * @var ResourceModel\Custom
     */
    protected $customResource;

    /**
     * @var ResourceModel\Custom\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var \Tam\BannerSlider\Api\Data\CustomSearchResultInterfaceFactory
     */
    protected $searchResultInterfaceFactory;

    /**
     * CustomRepository constructor.
     * @param \Tam\BannerSlider\Model\CustomFactory $customFactory
     * @param ResourceModel\Custom $customResource
     * @param ResourceModel\Custom\CollectionFactory $collectionFactory
     * @param \Tam\BannerSlider\Api\Data\CustomSearchResultInterfaceFactory $searchResultInterfaceFactory
     */
    public function __construct(
        \Tam\BannerSlider\Model\CustomFactory $customFactory,
        \Tam\BannerSlider\Model\ResourceModel\Custom $customResource,
        \Tam\BannerSlider\Model\ResourceModel\Custom\CollectionFactory $collectionFactory,
        \Tam\BannerSlider\Api\Data\CustomSearchResultInterfaceFactory $searchResultInterfaceFactory
    ) {
        $this->customFactory = $customFactory;
        $this->customResource = $customResource;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultInterfaceFactory = $searchResultInterfaceFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($id)
    {
        $customModel = $this->customFactory->create();
        $this->customResource->load($customModel, $id);
        if (!$customModel->getId()) {
            throw new NoSuchEntityException(__('Không có giá trị', $id));
        }
        return $customModel;
    }

    /**
     * {@inheritdoc}
     */
    public function save(CustomInterface $tambanner)
    {
        $this->customResource->save($tambanner);
        return $tambanner;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($id)
    {
        try {
            $customModel = $this->customFactory->create();
            $this->customResource->load($customModel, $id);
            $this->customResource->delete($customModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     */
    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     */
    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     */
    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     * @return mixed
     */
    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultInterfaceFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
