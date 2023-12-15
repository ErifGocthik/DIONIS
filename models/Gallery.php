<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property int $event_id
 * @property string $image
 * @property string $author
 *
 * @property Events $event
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'image', 'author'], 'required'],
            [['event_id'], 'integer'],
            [['author'], 'string', 'max' => 256],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Events::class, 'targetAttribute' => ['event_id' => 'id']],
            [['image'], 'file', 'on'=>'update', 'skipOnEmpty'=>false, 'extensions' => 'png,jpeg,jpg,bmp'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->image as $file) {
                $file->saveAs('gallery/' . $file->baseName . '.' . $file->extension);
            }
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
            'event_id' => Yii::t('app', 'Event ID'),
            'image' => Yii::t('app', 'Image'),
            'author' => Yii::t('app', 'Author'),
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
    public function saveGallery()
    {
        $gallery = new Gallery();
        if (!$this->validate())
        {
            return false;
        }

        $event_id = $this->event_id;
        $author = $this->author;

        foreach ($this->image as $file)
        {
            $gallery->event_id = $event_id;
            $gallery->image = $file;
            $gallery->author = $author;

            return $gallery->save()?$gallery:null;
        }
        return true;
    }
}
