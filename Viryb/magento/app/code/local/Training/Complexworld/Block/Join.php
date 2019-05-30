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

    public function getLeftJoin()
    {
        $leftJoin = $this->getCollection();
        $leftJoin->getSelect()
            ->joinLeft(Mage::getSingleton('core/resource')->getTableName('helloworld/blogpost'),
                'blogpost_id=entity_id',
                ['additional']);

        return $leftJoin;
    }

    public function getRightJoin()
    {
        $rightJoin = $this->getCollection();
        $rightJoin->getSelect()
            ->joinRight(Mage::getSingleton('core/resource')->getTableName('helloworld/blogpost'),
                'blogpost_id=entity_id',
                ['additional']);

        return $rightJoin;
    }

    public function getJoinField()
    {
        $joinField = $this->getCollection();
        $joinField->joinField('blog', Mage::getSingleton('core/resource')->getTableName('helloworld/blogpost'),
                'additional',
                'blogpost_id=entity_id',
                 null,
                'inner');
       // public function joinField($alias, $table, $field, $bind, $cond=null, $joinType='inner')

        return $joinField;
    }

}