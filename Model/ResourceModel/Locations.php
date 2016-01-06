<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 5/1/16
 * Time: 1:21 AM
 */
namespace Lapisbard\StoreLocator\Model\ResourceModel;
class Locations extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Model Initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('lapisbard_store_location', 'id');
    }
}
