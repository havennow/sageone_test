<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sage_categoria".
 *
 * @property string $id
 * @property string $nome
 *
 * @property SageProduto[] $sageProdutos
 * @property SageProduto[] $sageProdutos0
 * @property SageSubcategoria[] $sageSubcategorias
 */
class SageCategoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sage_categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSageProdutos()
    {
        return $this->hasMany(SageProduto::className(), ['id_subcategoria1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSageProdutos0()
    {
        return $this->hasMany(SageProduto::className(), ['id_subcategoria2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSageSubcategorias()
    {
        return $this->hasMany(SageSubcategoria::className(), ['id_categoria' => 'id']);
    }
}
