<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "CategoryInterface.php";

class Category implements CategoryInterface
{
    /**
     * @var $name
     */
    protected $name;
    /**
     * @var array
     */
    protected $child = array();

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * getChild()
     *
     * @return bool
     */
    public function getChild()
    {
        if(!empty($this->child)){

            return true;
        }
    }

    /**
     * @param CategoryInterface $category
     */
    public function addChild(CategoryInterface $category)
    {
        if(in_array($category, $this->child, true)){

            return;
        }

        $this->child[] = $category;
    }

    /**
     * @param CategoryInterface $category
     */
    public function removeChild(CategoryInterface $category)
    {
        foreach ($this->child as $key => $childItem){
            if($category === $childItem){
               unset($this->child[$key]);
            }
        }
    }

    /**
     * Get tree method
     *
     * @param int $level
     * @return string
     */
    private function getTree($level = 0)
    {
        $text = str_repeat("-", $level)." ". $this->getName() . "</br>";

        if($this->getChild()){
            foreach ($this->child as $childItem){
                $text.= $childItem->getTree($level + 1);
            }
        }
        return $text;
    }

    /**
     * Function wrapping for private method
     *
     * @return string
     */
    public function wrapping()
    {
        return $this->getTree();
    }
}
