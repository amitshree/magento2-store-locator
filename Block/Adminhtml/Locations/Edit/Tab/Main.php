<?php
/**
 * Copyright © 2015 Retailon. All rights reserved.
 */

// @codingStandardsIgnoreFile

namespace Lapisbard\StoreLocator\Block\Adminhtml\Locations\Edit\Tab;


use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;


class Main extends Generic implements TabInterface
{

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Location Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Location Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_lapisbard_storelocator_locations');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');

        $countries = [['value' => 'UK', 'label' => __('UK')], ['value' => 'India', 'label' => __('India')]];
        $yesno = [['value' => 'Enabled', 'label' => __('Enabled')], ['value' => 'Disabled', 'label' => __('Disabled')]];

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Location Information')]);
        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }

        $fieldset->addField(
            'store_title',
            'text',
            ['name' => 'store_title', 'label' => __('Store Title'), 'title' => __('Store Title'), 'required' => true]
        );
        $fieldset->addField(
            'address',
            'text',
            ['name' => 'address', 'label' => __('Address'), 'title' => __('Address'), 'required' => true]
        );
        $fieldset->addField(
            'city',
            'text',
            ['name' => 'city', 'label' => __('City'), 'title' => __('City'), 'required' => false]
        );
        $fieldset->addField(
            'state',
            'text',
            ['name' => 'state', 'label' => __('State'), 'title' => __('State'), 'required' => true]
        );
        $fieldset->addField(
            'pincode',
            'text',
            ['name' => 'pincode', 'label' => __('Pin Code'), 'title' => __('Pin Code'), 'required' => true]
        );
        $fieldset->addField(
            'country',
            'select',
            ['name' => 'country', 'label' => __('Country'), 'title' => __('Country'), 'values' => $countries]
        );
        $fieldset->addField(
            'phone',
            'text',
            ['name' => 'phone', 'label' => __('Phone Number'), 'title' => __('Phone Number'), 'required' => true]
        );
          $fieldset->addField(
            'email',
            'text',
            ['name' => 'email', 'label' => __('Email'), 'title' => __('Email'), 'required' => false]
        );
        $fieldset->addField(
            'is_enable',
            'select',
            [
                'name' => 'is_enable',
                'label' => __('Status'),
                'title' => __('Status'),
                'values' => $yesno
            ]
        );
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
