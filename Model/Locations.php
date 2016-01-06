<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 5/1/16
 * Time: 1:17 AM
 */
namespace Lapisbard\StoreLocator\Model;
class Locations extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Lapisbard\StoreLocator\Model\ResourceModel\Locations');
    }
}