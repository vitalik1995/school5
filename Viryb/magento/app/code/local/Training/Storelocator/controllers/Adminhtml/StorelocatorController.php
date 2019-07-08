<?php
/**
 * Training Storelocator adminhtml controller
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Adminhtml_StorelocatorController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->_initAction()
            ->renderLayout();
    }

    /**
     * Create new store
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Edit store
     *
     * @throws Mage_Core_Exception
     * @throws Varien_Exception
     */
    public function editAction()
    {
        $this->_initAction();
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('storelocator/store');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This store no longer exists'));
                $this->_redirect('*/*/');

                return $this;
            }
        }

        $this->_title($model->getId() ? $model->getTitle() : $this->__('New Store'));

        $data = Mage::getSingleton('adminhtml/session')->getStorelocatorData(true);

        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('store', $model);

        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit Store') : $this->__('New Store'), $id ? $this->__('Edit Store') : $this->__('New Store'))
            ->_addContent($this->getLayout()->createBlock('storelocator/adminhtml_store_edit'))
            ->_addLeft($this->getLayout()->createBlock("storelocator/adminhtml_store_edit_tabs"))
            ->renderLayout();
    }

    /**
     * Save store after edit
     *
     * @throws Varien_Exception
     */
    public function saveAction()
    {
        if ($storeData = $this->getRequest()->getPost()) {
            $model = Mage::getSingleton('storelocator/store');
            $model->setData($storeData);

            try {
                $model->save();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The store has been saved'));
                $this->_redirect('*/*/');

                return $this;

            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this store.'));
            }
            Mage::getSingleton('adminhtml/session')->setStorelocatorData($storeData);
            $this->_redirectReferer();
        }
    }

    /**
     * Delete store from edit form
     *
     * @throws Varien_Exception
     */
    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            $model = Mage::getModel('storelocator/store')->load($id);
            try {

                $model->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The store has been deleted'));
                $this->_redirect('*/*/');

                return $this;
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
    }

    /**
     * Mass delete from grid
     *
     * @throws Varien_Exception
     */
    public function massDeleteAction()
    {
        $storeIds = $this->getRequest()->getParam('store');
        if (!is_array($storeIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')
                ->__('Please select item(s)'));
        } else {
            try {
                $storeCollection = Mage::getResourceModel('storelocator/store_collection')
                    ->addAttributeToFilter('entity_id', array('in' => $storeIds));
                $storeCollection->load();
                $storeCollection->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__('Total of %d record(s) were successfully deleted', count($storeIds)));

            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

    /**
     * Mass change status from grid
     *
     * @throws Varien_Exception
     */
    public function massStatusAction()
    {
        $storeIds = $this->getRequest()->getParam('store');
        if (!is_array($storeIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')
                ->__('Please select item(s)'));
        } else {
            try {
                $storeCollection = Mage::getResourceModel('storelocator/store_collection')
                    ->addAttributeToFilter('entity_id', array('in' => $storeIds));
                foreach ($storeCollection as $store) {
                    $store->load($store->getId())
                        ->setStatus(intval($this->getRequest()->getParam('status')))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($storeIds))
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

    /**
     * Export csv from grid
     *
     * @throws Varien_Exception
     */
    public function exportCsvAction()
    {
        $fileName = 'store.csv';
        $content = $this->getLayout()
            ->createBlock('storelocator/adminhtml_store_grid')->getCsv();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     * Export XML from grid
     *
     * @throws Varien_Exception
     */
    public function exportXmlAction()
    {
        $fileName = 'store.xml';
        $content = $this->getLayout()
            ->createBlock('storelocator/adminhtml_store_grid')->getXml();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     * Init elements
     *
     * @return $this
     */
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('storelocator/storelocator')
            ->_title($this->__('Storelocator'))->_title($this->__('Store'))
            ->_addBreadcrumb($this->__('Storelocator'), $this->__('Storelocator'))
            ->_addBreadcrumb($this->__('Store'), $this->__('Store'));

        return $this;
    }

    /**
     * Check permissions
     *
     * @return mixed
     * @throws Varien_Exception
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('storelocator/storelocator');
    }
}
