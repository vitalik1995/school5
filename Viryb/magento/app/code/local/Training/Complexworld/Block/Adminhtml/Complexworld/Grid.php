<?php
/**
 *
 * @category ${CATEGORY}
 * @package ${NAMESPACE}_${MODULE}
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_Block_Adminhtml_Compexworld_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct(){
        parent::__construct();
        $this->setId('complexworld_posts');
        $this->setDefaultSort('complexworld_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {

        // Instantiate the collection of data to be display on the grid
        $collection = Mage::getModel('complexworld/eavblogpost')->getCollection();
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $this->addColumn('blogpost_id', array(
            'header' => Mage::helper('complexworld')->__('ID'),
            'sortable' => true,
            'width' => '60',
            'index' => 'blogpost_id'
        ));
        $this->addColumn('title', array(
            'header' => Mage::helper('complexworld')->__('Title'),
            'sortable' => true,
            'width' => '60',
            'index' => 'title',
            'type' => 'varchar'
        ));
        $this->addColumn('content', array(
            'header' => Mage::helper('complexworld')->__('Content'),
            'sortable' => true,
            'width' => '60',
            'index' => 'content',
            'type' => 'textarea'
        ));
        $this->addColumn('date', array(
            'header' => Mage::helper('complexworld')->__('Date'),
            'sortable' => true,
            'width' => '60',
            'index' => 'date',
            'type'  => 'datetime'

        ));
        $this->addColumn('created_at', array(
            'header' => Mage::helper('complexworld')->__('Created At'),
            'sortable' => true,
            'width' => '60',
            'index' => 'created_at',
            'type'  => 'datetime'
        ));

        return parent::_prepareColumns();

    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}