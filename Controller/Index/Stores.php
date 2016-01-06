<?php

namespace Lapisbard\StoreLocator\Controller\Index;

class Stores extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $storeCollectionFactory;
    const STATUS_ENABLED  = 'Enabled';
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
        $city = $this->getRequest()->getParam('city');


        if ($city != '') {
            $collection =$this->storeCollectionFactory
                               ->addFieldToSelect('*')
                               ->addFieldToFilter('city', $city)
                               ->addFieldToFilter('is_enable', self::STATUS_ENABLED);
            $stores = "<ul class='store-addresses'>";
            foreach ($collection as $_store) {
                if($_store['city']) {
                    $stores .= "<li>";
                    $stores .= "<p>" . $_store['store_title'] . "</p>";
                    $stores .= "<p>" . $_store['address'] . "</p>";
                    $stores .= "<p>" . $_store['city'] . "</p>";
                    $stores .= "<p>" . $_store['state'] . "</p>";
                    $stores .= "<p>" . $_store['pincode'] . "</p>";
                    $stores .= "<p>" . $_store['phone'] . "</p>";
                    $stores .= "<p>" . $_store['email'] . "</p>";

                    $stores .= "</li>";

                }
            }
            $stores .="</ul>";
        }

        $result['htmlconent']=$stores;
        $this->getResponse()->representJson(
            $this->_objectManager->get('Magento\Framework\Json\Helper\Data')->jsonEncode($result)
        );
    }
}