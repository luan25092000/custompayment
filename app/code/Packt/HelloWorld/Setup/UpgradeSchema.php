<?php

namespace Packt\HelloWorld\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.0.4') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $connection = $installer->getConnection();
            //Install new database table
            $table = $installer->getConnection()->newTable(
                $installer->getTable('Packt_HelloWorld_Subscription')
            )->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
                'Entity Id'
            )->addColumn(
                'attribute_set_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [],
                'Attribute set id'
            )->addColumn(
                'type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Type id'
            )->addColumn(
                'sku',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Sku'
            )->addColumn(
                'required_option',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [],
                'Required option'
            )->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null, [
                'nullable' => false,
                'default' =>
                    \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT
            ],
                'Created at'
            )->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                'Updated at'
            )->addColumn(
                'Name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                ['nullable' => false],
                'Name'
            )->addColumn(
                'price',
                \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                null,
                ['nullable' => false],
                'Price'
            )->addColumn(
                'is_salable',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,

                [],
                'Is salable'
            )->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [],
                'Store id'
            );
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
        }
    }
}
