<?php

namespace Tam\BannerSLider\Observer;

use Magento\Framework\Event\Observer;

class ChangeName implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(Observer $observer)
    {
        $model = $observer->getData('postData');
        $model->setData('name', 'Đã thay đổi được dữ liệu name của Banner.');
        $observer->setData('postData', $model);
    }
}
