<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false],
			[['file'], 'testFile'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'Arquivo para importação',
        ];
    }
	public function testFile($attribute, $params)
	    {
			$file_test = $this->file;

			if($file_test->extension != 'csv' && $file_test->extension != 'txt')
			{
			$this->addError($attribute, 'Tipos de arquivos suportados é : csv ou txt');	
			}
	            
	        
	    }
		
    public function upload()
    {
		$file_path = \Yii::getAlias('@upload');
        if ($this->validate()) {
            $this->file->saveAs($file_path . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }
}