<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actor".
 *
 * @property int $id
 * @property string $fullname
 * @property string|null $image
 * @property string|null $description
 *
 * @property Actors[] $actors
 */
class Actor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname'], 'required'],
            [['description'], 'string'],
            [['fullname', 'image'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fullname' => Yii::t('app', 'Ф.И.О.'),
            'image' => Yii::t('app', 'Фото'),
            'description' => Yii::t('app', 'Краткая биография'),
        ];
    }

    /**
     * Gets query for [[Actors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(Actors::class, ['actor_id' => 'id']);
    }
}