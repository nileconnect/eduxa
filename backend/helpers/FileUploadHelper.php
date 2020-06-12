<?php
namespace  backend\helpers;

use yii\base\Model;

class FileUploadHelper extends Model
{
    public $file;

    public function rules()
    {
        return [
            ['file', 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx'],
        ];
    }
}

?>