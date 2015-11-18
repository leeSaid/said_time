<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paper".
 *
 * @property integer $id
 * @property string $createdbyid
 * @property string $article
 * @property string $created_at
 * @property string $updated_at
 */
class Paper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article'], 'string'],
            //[['created_at', 'updated_at'], 'required'],
            //[['created_at', 'updated_at'], 'safe'],
            //[['createdbyid'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'createdbyid' => 'Createdbyid',
            'article' => 'Article',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
