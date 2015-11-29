<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "said_comment".
 *
 * @property integer $id
 * @property string $said_id
 * @property string $comment
 * @property integer $status
 * @property string $user_id
 * @property string $to_user_id
 * @property string $created_at
 */
class SaidComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'said_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['said_id', 'comment', 'user_id', 'to_user_id'], 'required'],
            [['said_id', 'status', 'user_id', 'to_user_id', 'created_at'], 'integer'],
            [['comment'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'said_id' => 'Said ID',
            'comment' => 'Comment',
            'status' => 'Status',
            'user_id' => 'User ID',
            'to_user_id' => 'To User ID',
            'created_at' => 'Created At',
        ];
    }
}
