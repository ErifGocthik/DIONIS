<?php

namespace app\models;

use Yii;

/**
 * Here just getting the Events model.
*/

/**
 * This is the model class for table "ticket".
 *
 * @property int $id
 * @property int $event_id
 * @property string|null $begin
 * @property string|null $place_id
 * @property int $price
 * @property string $phone_number
 *
 * @property Events $event
 * @property Places $place
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'price'], 'integer'],
            ['place_id', 'string', 'max'=>256],
            [['begin', 'place_id', '_crsf', 'price', 'event_id'], 'safe'],
            [['phone_number'], 'string', 'max' => 128],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Events::class, 'targetAttribute' => ['event_id' => 'id']],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Places::class, 'targetAttribute' => ['place_id' => 'id']],
            ['event_id', 'default', 'value'=>$_GET['id']],
            ['price', 'default', 'value'=>Events::findOne($_GET['id'])->price],
            ['begin', 'default', 'value'=>Events::findOne($_GET['id'])->start],
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
            'begin' => Yii::t('app', 'Begin'),
            'place_id' => Yii::t('app', 'Place ID'),
            'price' => Yii::t('app', 'Price'),
            'phone_number' => Yii::t('app', 'Номер телефона'),
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

    /**
     * Gets query for [[Place]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Places::class, ['id' => 'place_id']);
    }

    public function saveTicket()
    {
        $ticket = new Ticket();
        $event = Events::findOne($_GET['id']);

        if (!$this->validate())
        {
            Yii::$app->session->setFlash('danger', 'Что-то пошло не так');
        }

        $places = $_POST['places'];
        $phone_number = $_POST['phone_number'];

        $ticket->place_id = $places;
        $ticket->price = ($event->price)*count(explode(',', $places));
        $ticket->phone_number = $phone_number;

        return $ticket->save()?$ticket:null;
    }
}
