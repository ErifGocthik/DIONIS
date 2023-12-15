<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property int $age_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $author
 * @property string $director
 * @property string $duration
 * @property string $idea
 * @property string $street
 * @property string $start
 * @property int $style_id
 * @property int $count_of_tickets
 * @property int $price
 *
 * @property Actors[] $actors
 * @property Gallery[] $galleries
 * @property Style $style
 * @property Ticket[] $tickets
 * @property Age $age
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'image', 'author', 'director', 'age_id', 'duration', 'idea', 'street', 'style_id', 'count_of_tickets'], 'required'],
            [['description'], 'string'],
            [['start'], 'safe'],
            [['style_id', 'count_of_tickets', 'price', 'age_id'], 'integer'],
            [['title', 'author', 'director', 'idea'], 'string', 'max' => 256],
            [['duration'], 'string', 'max' => 16],
            [['street'], 'string', 'max' => 512],
            [['style_id'], 'exist', 'skipOnError' => true, 'targetClass' => Style::class, 'targetAttribute' => ['style_id' => 'id']],
            [['age_id'], 'exist', 'skipOnError' => true, 'targetClass' => Age::class, 'targetAttribute' => ['age_id' => 'id']],
            [['image'], 'file', 'on'=>'update', 'skipOnEmpty'=>false, 'extensions' => 'png,jpeg,jpg']
        ];
    }

    public function upload()
    {
        if ($this->validate())
        {
            $this->image->saveAs('images/'.$this->image->baseName.'.'.$this->image->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Название'),
            'description' => Yii::t('app', 'Описание'),
            'image' => Yii::t('app', 'Изображение'),
            'author' => Yii::t('app', 'Автор'),
            'director' => Yii::t('app', 'Директор'),
            'age_id' => Yii::t('app', 'Возраст'),
            'duration' => Yii::t('app', 'Продолжительность'),
            'idea' => Yii::t('app', 'Автор идеи'),
            'street' => Yii::t('app', 'Улица'),
            'start' => Yii::t('app', 'Начало'),
            'style_id' => Yii::t('app', 'Жанр'),
            'count_of_tickets' => Yii::t('app', 'Количество билетов'),
            'price' => Yii::t('app', 'Цена'),
        ];
    }

    /**
     * Gets query for [[Actors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(Actors::class, ['event_id' => 'id']);
    }

    /**
     * Gets query for [[Galleries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGalleries()
    {
        return $this->hasMany(Gallery::class, ['event_id' => 'id']);
    }

    /**
     * Gets query for [[Style]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStyle()
    {
        return $this->hasOne(Style::class, ['id' => 'style_id']);
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::class, ['event_id' => 'id']);
    }
    public function getAge()
    {
        return $this->hasOne(Age::class, ['id' => 'age_id']);
    }
}
