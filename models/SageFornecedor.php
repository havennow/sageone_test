<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sage_fornecedor".
 *
 * @property string $id
 * @property string $nome
 * @property string $endereco
 * @property string $contato
 *
 * @property SageProduto[] $sageProdutos
 */
class SageFornecedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sage_fornecedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'endereco'], 'string', 'max' => 500],
            [['contato'], 'string', 'max' => 200]
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
            'endereco' => 'Endereço',
            'contato' => 'Contato',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSageProdutos()
    {
        return $this->hasMany(SageProduto::className(), ['id_fornecedor' => 'id']);
    }
}
