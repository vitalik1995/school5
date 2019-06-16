<?php
/**
 * Training Contact Adminhtml Message controller
 *
 * @category Training
 * @package Training_Contact
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Contact_Adminhtml_MessageController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        // Let's call our initAction method which will set some basic params for each action
        $this->_initAction()
            ->renderLayout();
    }

    /**
     * Create new post
     */
    public function newAction()
    {
        // We just forward the new action to a blank edit form
        $this->_forward('edit');
    }

    /**
     * Edit post
     *
     * @throws Mage_Core_Exception
     * @throws Varien_Exception
     */
    public function editAction()
    {
        $this->_initAction();
        // Get id if available

        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('contact/message');

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

        $data = Mage::getSingleton('adminhtml/session')->getContactData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('email', $model);

        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit Post') : $this->__('New Post'), $id ? $this->__('Edit Post') : $this->__('New Post'))
            ->_addContent($this->getLayout()->createBlock('contact/adminhtml_message_edit')->setData('action', $this->getUrl('*/*/save')))
            ->renderLayout();
    }

    /**
     * Save post after edit
     *
     * @throws Varien_Exception
     */
    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost()) {
            $model = Mage::getSingleton('contact/message');
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

            Mage::getSingleton('adminhtml/session')->setContactData($postData);
            $this->_redirectReferer();
        }
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            $model = Mage::getModel('contact/message')->load($id);
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

    /**
     * Send email to customer with answer
     *
     * @throws Varien_Exception
     */
    public function sendAction()
    {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('contact/message')->load($id);
        $status = $model->getStatus();
        $answer = $model->getAnswer();
        if (!$model->getAnswer()) {

            Mage::getSingleton('adminhtml/session')->addError($this->__('An answer is empty.'));
            $this->_redirect('*/*/');
        }
        if (($model->getAnswer()) != '' && $model->getStatus() == 0) {

            $mail = Mage::getModel('core/email');
            $mail->setToName($model->getName());
            $mail->setToEmail($model->getEmail());
            $mail->setBody($model->getComment() . " " . $model->getAnswer());
            $mail->setFromName('admin');
            $mail->setType('text');
            try {
                Mage::log($mail, null, 'email.log', true);
                $model->setStatus('1');
                $model->save();

                Mage::getSingleton('core/session')->addSuccess('Your request has been sent');
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('core/session')->addError('Unable to send.');
                $this->_redirect('*/*/');
            }
        } elseif ($model->getStatus() == '1') {
            $this->_redirect('adminhtml/message/save/id/'.$this->getRequest()->getParam('id'));
            Mage::getSingleton('core/session')->addSuccess('You already sent your answer');

            $this->_redirect('*/*/');
        }
    }

    public function messageAction()
    {
        $data = Mage::getModel('contact/message')->load($this->getRequest()->getParam('id'));
        echo $data->getContent();
    }

    /**
     * @throws Varien_Exception
     */
    public function massDeleteAction()
    {
        $postIds = $this->getRequest()->getParam('contact');
        if (!is_array($postIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')
                ->__('Please select item(s)'));
        } else {
            try {
                $postCollection = Mage::getResourceModel('contact/message_collection')
                    ->addFieldToFilter('message_id', array('in'=>$postIds));
                foreach ($postCollection as $post) {
                    $post->delete();
                }

                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__('Total of %d record(s) were successfully deleted', count($postIds)));

            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

    /**
     * @throws Varien_Exception
     */
    public function massStatusAction()
    {
        $postIds = $this->getRequest()->getParam('contact');
        if (!is_array($postIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')
                ->__('Please select item(s)'));
        } else {
            try {
                $postCollection = Mage::getResourceModel('contact/message_collection')
                    ->addFieldToFilter('message_id', array('in' => $postIds));
                foreach ($postCollection as $post) {
                    $post->load($post->getId())
                        ->setStatus(intval($this->getRequest()->getParam('status')))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($postIds))
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

    /**
     * @throws Varien_Exception
     */
    public function exportCsvAction()
    {
        $fileName = 'post.csv';
        $content = $this->getLayout()
            ->createBlock('contact/adminhtml_message_grid')->getCsv();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     * @throws Varien_Exception
     */
    public function exportXmlAction()
    {
        $fileName = 'post.xml';
        $content = $this->getLayout()
            ->createBlock('contact/adminhtml_message_grid')->getXml();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     * Set active menu item
     *
     * @return $this
     */
    protected function _initAction()
    {
        $this->loadLayout()
            // Make the active menu match the menu config nodes (without 'children' inbetween)
            ->_setActiveMenu('helloworld/training_contact')
            ->_title($this->__('Contact'))->_title($this->__('Message'))
            ->_addBreadcrumb($this->__('Contact'), $this->__('Message'))
            ->_addBreadcrumb($this->__('Message'), $this->__('Message'));

        return $this;
    }

    /**
     * @return mixed
     * @throws Varien_Exception
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('helloworld/training_contact');
    }
}
