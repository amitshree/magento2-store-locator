<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 5/1/16
 * Time: 12:24 AM
 */
namespace Lapisbard\StoreLocator\Controller\Adminhtml\Locations;
class Edit extends \Lapisbard\StoreLocator\Controller\Adminhtml\Locations
{

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create('Lapisbard\StoreLocator\Model\Locations');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $this->_redirect('lapisbard_storelocator/*');
                return;
            }
        }
        // set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getPageData(true);
        if (!empty($data)) {
            $model->addData($data);
        }
        $this->_coreRegistry->register('current_lapisbard_storelocator_locations', $model);
        $this->_initAction();
        $this->_view->getLayout()->getBlock('locations_locations_edit');
        $this->_view->renderLayout();
    }
}
