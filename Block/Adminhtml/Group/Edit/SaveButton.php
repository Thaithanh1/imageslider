<?php

namespace Tam\BannerSlider\Block\Adminhtml\Group\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->_isAllowedAction('Tam_BannerSlider::group_create') ||
            $this->_isAllowedAction('Tam_BannerSlider::group_update')
        ) {
            $data = [
                'label' => __('Save Group'),
                'class' => 'save primary',
                'data_attribute' => [
                    'mage-init' => ['button' => ['event' => 'save']],
                    'form-role' => 'save',
                ],
                'sort_order' => 90,
            ];
        }
        return $data;
    }
}
