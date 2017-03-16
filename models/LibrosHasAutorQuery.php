<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibrosHasAutor]].
 *
 * @see LibrosHasAutor
 */
class LibrosHasAutorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LibrosHasAutor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibrosHasAutor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
