<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Libros]].
 *
 * @see Libros
 */
class LibrosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Libros[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Libros|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}