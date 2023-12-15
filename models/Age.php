<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "age".
 *
 * @property int $id
 * @property string $age
 *
 * @property Events[] $events
 */
class Age extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'age';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age'], 'required'],
            [['age'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'age' => Yii::t('app', 'Age'),
        ];
    }

    /**
     * Gets query for [[Events]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::class, ['age_id' => 'id']);
    }
}
