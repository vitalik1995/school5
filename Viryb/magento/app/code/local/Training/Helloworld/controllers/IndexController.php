<?php
/**
 * Training Helloworld
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */
class Training_Helloworld_IndexController extends Mage_Core_Controller_Front_Action
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
     * Goodbye action
     */
    public function goodbyeAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Default action
     */
    public function defaultAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * @throws Mage_Core_Exception
     */
    public function detailAction()
    {
        $id = $this->getRequest()->getParam('id');
        $post = Mage::getModel('helloworld/blogpost')->load($id);
        Mage::register('post', $post);
        $this->loadLayout();
        $this->renderLayout();
    }

    public function createNewPostAction() {
        $blogpost = Mage::getModel('helloworld/blogpost');
        $blogpost->setTitle('Code Post!');
        $blogpost->setPost('This post was created from code!');
        $blogpost->save();
        echo 'post with ID ' . $blogpost->getId() . ' created';
    }

    public function editPostAction()
    {
        $id = $this->getRequest()->getParam('id');
        $blogpost = Mage::getModel('helloworld/blogpost');
        $blogpost->load($id);
        $blogpost->setTitle("The First post!");
        $blogpost->save();
        echo 'post edited';
    }

    public function deletePostAction()
    {
        $id = $this->getRequest()->getParam('id');
        $blogpost = Mage::getModel('helloworld/blogpost');
        $blogpost->load($id);
        $blogpost->delete();
        echo 'post removed';
    }


}
