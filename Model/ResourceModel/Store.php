<?php

declare(strict_types=1);

namespace Tam\BannerSlider\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

use Magento\Framework\Model\ResourceModel\PredefinedId;

class Store extends AbstractDb

{

    /**

     * Provides possibility of saving entity with predefined/pre-generated id

     */

    use PredefinedId;

    /**#@+

     * Constants related to specific db layer

     */

    private const TABLE_NAME_STOCK = 'tam_banners_slider';
    // private const TABLE_NAME = 'tam_banners_slider_group';


    /**#@-*/

    /**

     * @inheritdoc

     */

    protected function _construct()

    {

        $this->_init(self::TABLE_NAME_STOCK, 'id');
        // $this->_init(self::TABLE_NAME, 'id');

    }
}
