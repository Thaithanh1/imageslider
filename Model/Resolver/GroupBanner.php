<?php

declare(strict_types=1);

namespace Tam\BannerSlider\Model\Resolver;

use Tam\BannerSlider\Api\StoreRepositoryInterface;

use Tam\BannerSlider\Model\Store\GetList;

use Magento\Framework\GraphQl\Config\Element\Field;

use Magento\Framework\GraphQl\Exception\GraphQlInputException;

use Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder as SearchCriteriaBuilder;

use Magento\Framework\GraphQl\Query\ResolverInterface;

use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class GroupBanner implements ResolverInterface

{

    /**
     * @var GetListInterface
     */

    private $groupbannerRepository;

    /**
     * @var SearchCriteriaBuilder
     */

    private $searchCriteriaBuilder;

    /**
     * PickUpStoresList constructor.
     * @param GetList $groupbannerRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */

    public function __construct(GroupBannerRepositoryInterface $groupbannerRepository, SearchCriteriaBuilder $searchCriteriaBuilder)

    {
        $this->groupbannerRepository = $groupbannerRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @inheritdoc
     */

    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $this->vaildateArgs($args);
        $searchCriteria = $this->searchCriteriaBuilder->build('tam_banners_slider_group', $args);
        $searchCriteria->setCurrentPage($args['currentPage']);
        $searchCriteria->setPageSize($args['pageSize']);
        $searchResult = $this->storeRepository->getList($searchCriteria);
        return [
            'total_count' => $searchResult->getTotalCount(),
            'items' => $searchResult->getItems(),
        ];
    }

    /**
     * @param array $args
     * @throws GraphQlInputException
     */

    private function vaildateArgs(array $args): void
    {
        if (isset($args['currentPage']) && $args['currentPage'] < 1) {
            throw new GraphQlInputException(__('currentPage value must be greater than 0.'));
        }
        if (isset($args['pageSize']) && $args['pageSize'] < 1) {
            throw new GraphQlInputException(__('pageSize value must be greater than 0.'));
        }
    }
}
