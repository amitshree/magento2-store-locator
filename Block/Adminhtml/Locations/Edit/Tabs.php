<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 5/1/16
 * Time: 12:01 AM
 */

namespace Lapisbard\StoreLocator\Block\Adminhtml\Locations\Edit;
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('lapisbard_storelocator_locations_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Location'));
    }
}

