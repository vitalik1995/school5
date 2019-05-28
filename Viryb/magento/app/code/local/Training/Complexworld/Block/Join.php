<?php
/**
 * Training Complexworld join block
 *
 * @category Training
 * @package Training_Complexworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_Block_Join extends Mage_Core_Block_Template
{
    public function getCollection()
    {
        $collection = Mage::getResourceModel('complexworld/eavblogpost_collection')->addAttributeToSelect('*');

        return $collection;
    }

    public function getResult()
    {
        return $this->getCollection()
            ->joinTable(
                ['blogpost' => 'helloworld/blogpost'],
                'blogpost_id=entity_id',
                ['info' => 'additional']
            )->joinTable(
                ['foreignkey' => 'foreignkey/blogpost'],
                'post_id=entity_id',
                ['first_name']
            )->load();

        // public function joinTable($table, $bind, $fields = null, $cond = null, $joinType = 'inner')
    }
}