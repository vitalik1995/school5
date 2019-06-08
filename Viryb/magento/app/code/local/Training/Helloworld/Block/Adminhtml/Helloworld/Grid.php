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

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
