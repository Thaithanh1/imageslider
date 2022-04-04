<?php

namespace Tam\BannerSlider\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Tam\BannerSlider\Helper\Data;
use Tam\BannerSlider\Model\BannerFactory;

class BannerSlider extends Template implements BlockInterface
{
    /**
     * @var \Tam\BannerSlider\Model\BannerFactory
     */
    protected $bannerFactory;
    protected $helper;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Tam\BannerSlider\Model\BannerFactory $bannerFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Tam\BannerSlider\Model\BannerFactory $bannerFactory,
        array $data = [],
        Data $helper
    ) {
        $this->helper = $helper;
        $this->bannerFactory = $bannerFactory;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve the banners slider
     *
     * @param \Tam\BannerSlider\Model\Banner[]
     */
    public function getBanners()
    {
        $config = $this->helper->getConfigg('post/enable');
        
        if($config) {
            $groupId = (int)$this->getGroupId();
            $collection = $this->bannerFactory->create()->getCollection()->addFieldToFilter(
                'group_id',
                $groupId
            )->addFieldToFilter(
                'status',
                \Tam\BannerSlider\Model\Banner::STATUS_ENABLED
            )->setOrder('main_table.order', 'ASC');
            return $collection;
        } else {
            return "";
        }
    }
}
