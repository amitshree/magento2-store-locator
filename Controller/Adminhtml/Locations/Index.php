<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 4/1/16
 * Time: 6:26 PM
 */
namespace Lapisbard\StoreLocator\Controller\Adminhtml\Locations;
class Index extends \Lapisbard\StoreLocator\Controller\Adminhtml\Locations {

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Lapisbard_StoreLocator::locations');
        $resultPage->getConfig()->getTitle()->prepend(__('Store Locations'));
        $resultPage->addBreadcrumb(__('Lapisbard'), __('Lapisbard'));
        $resultPage->addBreadcrumb(__('Locations'), __('Locations'));
        return $resultPage;
    }
}