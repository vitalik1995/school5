<?php
/**
 * Training Contact Grid block
 *
 * @category Training
 * @package Training_Contact
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Contact_Block_Adminhtml_Message_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Training_Contact_Block_Adminhtml_Message_Grid constructor.
     */
    public function __construct()
    {
        parent::__construct();

        // Set some defaults for our grid
        $this->setDefaultSort('message_id');
        $this->setId('message_id');
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
        return 'contact/message_collection';
    }

    /**
     * Prepare collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare columns
     *
     * @return $this
     * @throws Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn('message_id',
            array(
                'header'=> $this->__('ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'message_id'
            )
        );
        $this->addColumn('name',
            array(
                'header'=> $this->__('Name'),
                'index' => 'name'
            )
        );
        $this->addColumn('email',
            array(
                'header'=> $this->__('Email'),
                'index' => 'email'
            )
        );

        $this->addColumn('status', array(
            'header'    => Mage::helper('contact')->__('Status'),
            'index'     => 'status',
            'type'      => 'options',
            'options'   => array(
                1 => 'Yes',
                0 => 'No',
            )
        ));

        $this->addExportType('*/*/exportCsv', Mage::helper('contact')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('contact')->__('XML'));

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
        $this->setMassactionIdField('contact_id');
        $this->getMassactionBlock()->setFormFieldName('contact');
        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('contact')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('contact')->__('Are you sure?')
        ));
        $statuses = Mage::getSingleton('contact/status')->getOptionArray();

        array_unshift($statuses, array('label' => '', 'value' => ''));
        $this->getMassactionBlock()->addItem('status', array(
            'label' => Mage::helper('contact')->__('Change status'),
            'url' => $this->getUrl('*/*/massStatus',
                array('_current' => true)),
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('contact')->__('Answered'),
                    'values' => $statuses
                ))
        ));

        return $this;
    }


    /**
     * Get row url for redirect
     *
     * @param $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
