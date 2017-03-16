<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Lectores]].
 *
 * @see Lectores
 */
class LectoresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Lectores[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Lectores|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
