<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 4/1/16
 * Time: 11:51 PM
 */
namespace Lapisbard\StoreLocator\Block\Adminhtml;
class Locations extends \Magento\Backend\Block\Widget\Grid\Container {
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'locations';
        $this->_headerText = __('Locations');
        $this->_addButtonLabel = __('Add New Location');
        parent::_construct();
    }
}