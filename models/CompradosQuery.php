<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Comprados]].
 *
 * @see Comprados
 */
class CompradosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Comprados[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Comprados|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
