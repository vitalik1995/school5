<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

interface CategoryInterface
{
    public function getName();
    public function setName($name);
    public function addChild(CategoryInterface $category);
    public function removeChild(CategoryInterface $category);
    public function getChild();
}
