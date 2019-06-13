<?php
/**
 * Training Helloworld Grid block
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Block_Adminhtml_Helloworld_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        // Set some defaults for our grid
        $this->setDefaultSort('id');
        $this->setId('helloworld_helloworld_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _getCollectionClass()
    {
        return 'helloworld/blogpost_collection';
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * @return $this
     * @throws Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn('blogpost_id',
            array(
                'header'=> $this->__('ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'blogpost_id'
            )
        );
        $this->addColumn('title',
            array(
                'header'=> $this->__('Title'),
                'index' => 'title'
            )
        );
        $this->addColumn('post',
            array(
                'header'=> $this->__('Post'),
                'index' => 'post'
            )
        );
        $this->addColumn('date',
            array(
                'header'=> $this->__('Date'),
                'index' => 'date'
            )
        );
        $this->addColumn('timestamp',
            array(
                'header'=> $this->__('Timestamp'),
                'index' => 'timestamp'
            )
        );
        $this->addColumn('Additional',
            array(
                'header'=> $this->__('Additional'),
                'index' => 'additional'
            )
        );
        $this->addColumn('status', array(
            'header'    => Mage::helper('helloworld')->__('Status'),
            'index'     => 'status',
            'type'      => 'options',
            'options'   => array(
                1 => 'Enabled',
                0 => 'Disabled',
            )
        ));

        $this->addExportType('*/*/exportCsv', Mage::helper('helloworld')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('helloworld')->__('XML'));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        //return parent::_prepareMassaction();

        $this->setMassactionIdField('helloworld_id');
        $this->getMassactionBlock()->setFormFieldName('helloworld');
        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('helloworld')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('helloworld')->__('Are you sure?')
        ));
        $statuses = Mage::getSingleton('helloworld/status')->getOptionArray();

        array_unshift($statuses, array('label' => '', 'value' => ''));
        $this->getMassactionBlock()->addItem('status', array(
            'label' => Mage::helper('helloworld')->__('Change status'),
            'url' => $this->getUrl('*/*/massStatus',
                array('_current' => true)),
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('helloworld')->__('Status'),
                    'values' => $statuses
                ))
        ));

        return $this;
    }

    public function getRowUrl($row)
    {
        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
