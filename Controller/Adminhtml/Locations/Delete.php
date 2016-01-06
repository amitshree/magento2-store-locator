<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 5/1/16
 * Time: 12:28 AM
 */
namespace Lapisbard\StoreLocator\Controller\Adminhtml\Locations;
class Delete extends \Lapisbard\StoreLocator\Controller\Adminhtml\Locations
{

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $model = $this->_objectManager->create('Lapisbard\StoreLocator\Model\Locations');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('You deleted the item.'));
                $this->_redirect('lapisbard_storelocator/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('We can\'t delete item right now. Please review the log and try again.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_redirect('lapisbard_storelocator/*/edit', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->messageManager->addError(__('We can\'t find a item to delete.'));
        $this->_redirect('lapisbard_storelocator/*/');
    }
}
