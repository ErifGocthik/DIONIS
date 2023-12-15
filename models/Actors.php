<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actors".
 *
 * @property int $id
 * @property int $event_id
 * @property int $actor_id
 *
 * @property Events $event
 * @property Actor $actor
 */
class Actors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'actor_id'], 'required'],
            [['event_id', 'actor_id'], 'integer'],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Events::class, 'targetAttribute' => ['event_id' => 'id']],
            [['actor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Actor::class, 'targetAttribute' => ['actor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'event_id' => Yii::t('app', 'Event ID'),
            'actor' => Yii::t('app', 'Actor'),
        ];
    }

    /**
     * Gets query for [[Event]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Events::class, ['id' => 'event_id']);
    }
    public function getActor()
    {
        return $this->hasOne(Actor::class, ['id' => 'actor_id']);
    }

}
