<?php
/**
 * Training Complexworld Index controller
 *
 * @category Training
 * @package Training_Complexworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Index action
     */
    public function indexAction()
    {

        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Detail post
     *
     * @throws Mage_Core_Exception
     */
    public function detailAction()
    {
        $id = $this->getRequest()->getParam('id');
        $post = Mage::getModel('complexworld/eavblogpost')->load($id);
        Mage::register('post', $post);
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Edit post
     *
     * @throws Mage_Core_Exception
     * @throws Varien_Exception
     */
    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        $postDate = $this->getRequest()->getPost();
        $post = Mage::getModel('complexworld/eavblogpost')->load($id);
        Mage::register('editPost', $post);
        if (!empty($postDate)) {
            $post->setTitle($postDate['title']);
            $post->setContent($postDate['content']);
            $post->setDate(now());
            $post->save();
            $this->_redirect('complexworld/index/index');
        }
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Create new post
     *
     * @throws Varien_Exception
     */
    public function createAction()
    {
        $postDate = $this->getRequest()->getPost();
        if (!empty($postDate)) {
            $post = Mage::getModel('complexworld/eavblogpost');
            $post->setTitle($postDate['title']);
            $post->setContent($postDate['content']);
            $post->setDate(now());
            $post->save();
            $this->_redirect('complexworld/index/index');
        }
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Delete post item
     *
     * @throws Exception
     */
    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        $post = Mage::getModel('complexworld/eavblogpost')->load($id);
        $post->delete();
        $this->_redirect('complexworld/index/index');
    }

    /**
     * Add new posts
     *
     * @throws Varien_Exception
     */
    public function populateEntriesAction()
    {
        for ($i = 0; $i < 10; $i++) {
            $weblog2 = Mage::getModel('complexworld/eavblogpost');
            $weblog2->setTitle('This is a test ' . $i);
            $weblog2->setContent('This is test content ' . $i);
            $weblog2->setDate(now());
            $weblog2->save();
        }

        echo 'Done';
    }

    /**
     * Show collection
     */
    public function showCollectionAction()
    {
        $weblog2 = Mage::getModel('complexworld/eavblogpost');
        $entries = $weblog2->getCollection()
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('content')
            ->addAttributeToSelect('date');
        $entries->load();
        foreach ($entries as $entry) {
             //var_dump($entry->getData());
            echo '<h2>' . $entry->getTitle() . '</h2>';
            echo '<p>Date: ' . $entry->getDate() . '</p>';
            echo '<p>' . $entry->getContent() . '</p>';
        }
        echo '</br>Done</br>';
    }
}