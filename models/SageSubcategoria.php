<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sage_subcategoria".
 *
 * @property string $id
 * @property string $id_categoria
 * @property string $nome
 *
 * @property SageCategoria $idCategoria
 */
class SageSubcategoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sage_subcategoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_categoria'], 'required'],
            [['id_categoria'], 'integer'],
            [['nome'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_categoria' => 'Categoria',
            'nome' => 'Nome da subcategoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoria()
    {
        return $this->hasOne(SageCategoria::className(), ['id' => 'id_categoria']);
    }
}
