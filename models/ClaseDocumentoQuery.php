<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ClaseLector]].
 *
 * @see ClaseLector
 */
class ClaseDocumentoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ClaseLector[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ClaseLector|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
