<?php
/**
 * Training Helloworld Adminhtml Helloworld controller
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Adminhtml_HelloworldController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        // Let's call our initAction method which will set some basic params for each action
        $this->_initAction()
            ->renderLayout();
    }

    public function newAction()
    {
        // We just forward the new action to a blank edit form
        $this->_forward('edit');
    }

    public function editAction()
    {
        $this->_initAction();
        // Get id if available

        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('helloworld/blogpost');

        if ($id) {
            // Load record
            $model->load($id);

            //Check id record is loaded
            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This post no longer exists'));
                $this->_redirect('*/*/');

                return;
            }
        }

        $this->_title($model->getId() ? $model->getTitle() : $this->__('New Post'));

        $data = Mage::getSingleton('adminhtml/session')->getHelloworldData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('virybpost', $model);

        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit Post') : $this->__('New Post'), $id ? $this->__('Edit Post') : $this->__('New Post'))
            ->_addContent($this->getLayout()->createBlock('helloworld/adminhtml_helloworld_edit')->setData('action', $this->getUrl('*/*/save')))
            ->renderLayout();
    }

    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost()) {
            $model = Mage::getSingleton('helloworld/blogpost');
            $model->setData($postData);

            try {
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The post has been saved'));
                $this->_redirect('*/*/');

                return;
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this post.'));
            }

            Mage::getSingleton('adminhtml/session')->setHelloworldData($postData);
            $this->_redirectReferer();
        }
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            $model = Mage::getModel('helloworld/blogpost')->load($id);
            try {
                $model->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The post has been deleted'));
                $this->_redirect('*/*/');

                return;
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
    }

    public function messageAction()
    {
        $data = Mage::getModel('helloworld/blogpost')->load($this->getRequest()->getParam('id'));
        echo $data->getContent();
    }

    protected function _initAction()
    {
        $this->loadLayout()
            // Make the active menu match the menu config nodes (without 'children' inbetween)
            ->_setActiveMenu('helloworld/helloworld')
            ->_title($this->__('Helloworld'))->_title($this->__('Post'))
            ->_addBreadcrumb($this->__('Helloworld'), $this->__('Helloworld'))
            ->_addBreadcrumb($this->__('Post'), $this->__('Post'));

        return $this;
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('helloworld/helloworld');
    }
}