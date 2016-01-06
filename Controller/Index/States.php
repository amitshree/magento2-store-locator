<?php

namespace Lapisbard\StoreLocator\Controller\Index;

class States extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $storeCollectionFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Lapisbard\StoreLocator\Model\ResourceModel\Locations\Collection $storeCollectionFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->storeCollectionFactory = $storeCollectionFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $country = $this->getRequest()->getParam('country');


        if ($country != '') {
            $collection =$this->storeCollectionFactory->addFieldToSelect('city')
                                                      ->addFieldToFilter('country', $country);
            $collection->getSelect()->group('city');
            if (!$collection->getData() || empty($collection->getData())) {
                $state = "Sorry, we don't have retailers available in your country.";
            }
            else {
                $state = "<select id='lapisbard-city' style='width:300px; text-indent: 55px;' onchange='showStores()'><option value=''>Select City</option>";
                foreach ($collection as $_state) {
                    if($_state['city']){
                        $state .= "<option text-indent: 55px;>" . $_state['city'] . "</option>";
                    }
                }
            }

        }
        $state .="</select>";
        $result['htmlconent']=$state;
        $this->getResponse()->representJson(
            $this->_objectManager->get('Magento\Framework\Json\Helper\Data')->jsonEncode($result)
        );
    }
}