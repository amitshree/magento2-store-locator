<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 4/1/16
 * Time: 3:19 PM
 */
namespace Lapisbard\StoreLocator\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface {
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // create table to store location information.
        $installer = $setup;

        $installer->startSetup();
        $table = $installer->getConnection()
                 ->newTable($installer->getTable('lapisbard_store_location'))
                 ->addColumn(
                     'id',
                     \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                     null,
                     ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                     'Id'
                 )
                ->addColumn(
                    'store_title',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    [],
                    'Store Title'
                )
                ->addColumn(
                    'address',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    [],
                    'Address'
                )
                ->addColumn(
                    'city',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    [],
                    'City'
                )
                ->addColumn(
                    'state',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    64,
                    ['default' => null],
                    'State'
                )
                ->addColumn(
                    'pincode',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    8,
                    [],
                    'Pin Code'
                )
                ->addColumn(
                    'country',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    64,
                    ['default' => null],
                    'Country'
                )
                ->addColumn(
                    'phone',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    12,
                    [],
                    'Phone number'
                )
                ->addColumn(
                'email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Email'
                )
            ->addColumn(
                'is_enable',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Status'
            );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}