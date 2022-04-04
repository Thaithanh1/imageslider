<?php
namespace Tam\BannerSlider\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends AbstractHelper
{
    // public function getText($text) {
    //     return $this->scopeConfig->getValue('helloworld/setting/'.$text, 
    //     ScopeInterface::SCOPE_STORE);
    // }
    protected $_storeManager;
    protected $scopeConfig;
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->_storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
    }
    public function getConfigg($key, $store = null, $section = "settingbanner")
    {
        $store = $this->_storeManager->getStore($store);
        $result = $this->scopeConfig->getValue(
            $section . '/' . $key,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $store
        );
        return $result;
    }
}
