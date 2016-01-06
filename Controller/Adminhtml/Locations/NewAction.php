<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 4/1/16
 * Time: 5:05 PM
 */
namespace Lapisbard\StoreLocator\Controller\Adminhtml\Locations;
class NewAction extends \Lapisbard\StoreLocator\Controller\Adminhtml\Locations
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
