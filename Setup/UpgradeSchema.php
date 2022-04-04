<?php

namespace Tam\BannerSlider\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        //Add new fields to the created table
        if (version_compare($context->getVersion(), '2.1.2') < 0) {
            $table = $setup->getTable('tam_banners_slider');
            //Check for the existence of the table
            if ($setup->getConnection()->isTableExists($table) == true) {
                // Declare data
                $columns = [
                    'description' => [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        ['nullable' => true],
                        'comment' => 'Description',
                    ],
                ];
                $connection = $setup->getConnection();
                foreach ($columns as $name => $definition) {
                    $connection->addColumn($table, $name, $definition);
                }
            }
        }
        $setup->endSetup();
    }
}
