<?php
/**
 * Training Blogwidget chooser block
 *
 * @category Training
 * @package Training_Blogwidget
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Blogwidget_Block_Widget_Chooser extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct($arguments = array())
    {
        parent::__construct($arguments);

        $this->setUseAjax(true);
       // $this->setDefaultFilter(array('chooser_is_active' => '1'));
    }


    /**
     * @param Varien_Data_Form_Element_Abstract $element
     * @return Varien_Data_Form_Element_Abstract
     * @throws Varien_Exception
     */
    public function prepareElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $uniqId = Mage::helper('core')->uniqHash($element->getId());
        $sourceUrl = $this->getUrl('*/blogwidget/chooser', array('uniq_id' => $uniqId));

        $chooser = $this->getLayout()->createBlock('widget/adminhtml_widget_chooser')
            ->setElement($element)
            ->setTranslationHelper($this->getTranslationHelper())
            ->setConfig($this->getConfig())
            ->setFieldsetId($this->getFieldsetId())
            ->setSourceUrl($sourceUrl)
            ->setUniqId($uniqId);


        if ($element->getValue()) {
            $post = Mage::getModel('helloworld/blogpost')->load((int)$element->getValue());
            if ($post->getId()) {
                $chooser->setLabel($post->getTitle());
            }
        }

        $element->setData('after_element_html', $chooser->toHtml());
        return $element;
    }

    /**
     * Grid Row JS Callback
     *
     * @return string
     */
    public function getRowClickCallback()
    {
        $chooserJsObject = $this->getId();
        $js = '
            function (grid, event) {
                var trElement = Event.findElement(event, "tr");
                var postTitle = trElement.down("td").next().innerHTML;
                var postId = trElement.down("td").innerHTML.replace(/^\s+|\s+$/g,"");
                ' . $chooserJsObject . '.setElementValue(postId);
                ' . $chooserJsObject . '.setElementLabel(postTitle);
                ' . $chooserJsObject . '.close();
            }
        ';
        return $js;
    }

    /**
     * Prepare pages collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('helloworld/blogpost')->getCollection();

        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * @return $this
     * @throws Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn('blogpost_id', array(
            'header' => Mage::helper('blog_widget')->__('ID'),
            'align' => 'right',
            'index' => 'blogpost_id',
            'width' => 50
        ));

        $this->addColumn('title', array(
            'header' => Mage::helper('blog_widget')->__('Title'),
            'align' => 'left',
            'index' => 'title',
        ));


        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/blogwidget/chooser', array('_current' => true));
    }
}
