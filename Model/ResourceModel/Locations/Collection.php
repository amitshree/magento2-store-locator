<?php

namespace Lapisbard\StoreLocator\Model\ResourceModel\Locations;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Lapisbard\StoreLocator\Model\Locations', 'Lapisbard\StoreLocator\Model\ResourceModel\Locations');
    }
}
