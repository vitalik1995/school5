<?php
/**
 * Training Blogwidget controller
 *
 * @category Training
 * @package Training_Blogwidget
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Blogwidget_Adminhtml_BlogwidgetController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Choose source action
     */
    public function chooserAction()
    {
        $uniqId = $this->getRequest()->getParam('uniq_id');
        $blogGrid = $this->getLayout()->createBlock('blog_widget/widget_chooser', '', array(
            'id' => $uniqId,
        ));
        $this->getResponse()->setBody($blogGrid->toHtml());
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }
}
