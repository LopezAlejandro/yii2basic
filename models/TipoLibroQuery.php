<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TipoLibro]].
 *
 * @see TipoLibro
 */
class TipoLibroQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TipoLibro[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TipoLibro|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
