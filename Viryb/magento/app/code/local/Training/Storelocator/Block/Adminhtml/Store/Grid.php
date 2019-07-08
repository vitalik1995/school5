<?php
/**
 * Training Storelocator widget grid
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Block_Adminhtml_Store_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Grid constructor
     *
     * Training_Storelocator_Block_Adminhtml_Store_Grid constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setDefaultSort('entity_id');
        $this->setId('training_storelocator_store_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    /**
     * Get collection class
     *
     * @return string
     */
    protected function _getCollectionClass()
    {
        return 'storelocator/store_collection';
    }

    /**
     * Prepare collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $collection->addAttributeToSelect('seller_code')
                    ->addAttributeToSelect('store_name')
                    ->addAttributeToSelect('status');
        $collection->load();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare columns
     *
     * @return $this
     * @throws Varien_Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn('entity_id',
            array(
                'header'=> $this->__('ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'entity_id'
            )
        );
        $this->addColumn('seller_code',
            array(
                'header'=> $this->__('Seller code'),
                'index' => 'seller_code'
            )
        );
        $this->addColumn('store_name',
            array(
                'header'=> $this->__('Store name'),
                'index' => 'store_name'
            )
        );

        $this->addColumn('status', array(
            'header'    => $this->__('Status'),
            'index'     => 'status',
            'type'      => 'options',
            'options'   => Mage::getModel('storelocator/status')->getOptionArray()
        ));

        $this->addExportType('*/*/exportCsv', Mage::helper('storelocator')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('storelocator')->__('XML'));

        return parent::_prepareColumns();
    }

    /**
     * Prepare massaction
     *
     * @return $this|Mage_Adminhtml_Block_Widget_Grid
     * @throws Varien_Exception
     */
    protected function _prepareMassaction()
    {

        $this->setMassactionIdField('store_id');
        $this->getMassactionBlock()->setFormFieldName('store');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('storelocator')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('storelocator')->__('Are you sure?')
        ));
        $statuses = Mage::getSingleton('storelocator/status')->getOptionArray();

       // array_unshift($statuses, array('label' => '', 'value' => ''));
        $this->getMassactionBlock()->addItem('status', array(
            'label' => Mage::helper('storelocator')->__('Change status'),
            'url' => $this->getUrl('*/*/massStatus',
                array('_current' => true)),
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('storelocator')->__('Status'),
                    'values' => $statuses
                ))
        ));

        parent::_prepareMassaction();

        return $this;
    }

    /**
     * Get row url
     *
     * @param $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
