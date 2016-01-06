<?php

namespace Lapisbard\StoreLocator\Block;
class Stores extends \Magento\Framework\View\Element\Template {

    public function getTitle() {
        $html = '<span class="lapis-store-title"><h1>FIND LAPIS BARD</h1></span>';
        return $html;
    }
    public function getStoreDescription() {
        $html = '<span class="lapis-store-desc"><p>Select country to find a Lapis Bard retailer close to you:</p></span>';
        return $html;
    }
}