<?php
/**
 * Training Eavgrid Grid block
 *
 * @category Training
 * @package Training_Eavgrid
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Eavgrid_Block_Adminhtml_Eav_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        // Set some defaults for our grid
        $this->setDefaultSort('id');
        $this->setId('training_eavgrid_eav_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _getCollectionClass()
    {
        return 'complexworld/eavblogpost_collection';
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('complexworld/eavblogpost')->getCollection();
        $collection->addAttributeToSelect('title')
                    ->addAttributeToSelect('content')
                    ->addAttributeToSelect('date');
        $collection->load();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * @return $this
     * @throws Exception
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
        $this->addColumn('title',
            array(
                'header'=> $this->__('Title'),
                'index' => 'title'
            )
        );
        $this->addColumn('content',
            array(
                'header'=> $this->__('Content'),
                'index' => 'content'
            )
        );
        $this->addColumn('date',
            array(
                'header'=> $this->__('Date'),
                'index' => 'date'
            )
        );

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
