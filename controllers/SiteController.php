<?php

namespace app\controllers;

use app\models\Actor;
use app\models\Actors;
use app\models\Events;
use app\models\Gallery;
use app\models\Places;
use app\models\SignupForm;
use app\models\Ticket;
use app\models\User;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'setplace', 'newevent', 'galleryform'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['setplace'],
                        'allow' => true,
                        'verbs' => ['POST'],
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['newevent'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['galleryform'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $slider = Events::find()->limit(3)->orderBy('id asc')->all();
        $query = Events::find();
        $count = clone $query;
        $pages = new Pagination(['totalCount'=>$count->count(), 'pageSize'=>3]);

        $events = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', ['events'=>$events, 'pages'=>$pages, 'slider'=>$slider]);
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (!Yii::$app->user->identity->isBan()) {
                if (Yii::$app->user->identity->isAdmin()) {
                    return $this->redirect(['admin/']);
                } else {
                    return $this->goHome();
                }
            } else {
                return $this->redirect(['site/ban']);
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionBan()
    {
        Yii::$app->user->logout();

        Yii::$app->session->setFlash('danger', 'Вы забанены на нашем сайте, если это произошло по ошибке, то свяжесь с администрацией сайта: dionis@gmail.com');

        return $this->goHome();
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionEvent($id)
    {
        $event = Events::findOne($id);
        $actors = Actors::find()->where(['event_id'=>$id])->all();
        $galleries = Gallery::find()->where(['event_id'=>$id])->all();

        return $this->render('event', ['event'=>$event, 'actors'=>$actors, 'galleries'=>$galleries]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionBuyticket($id)
    {
        $places = Places::find()->asArray()->all();
        $event = Events ::findOne($id);
        $ticket = Ticket::find()->all();
        $model = new Ticket();
//        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        Yii::$app->session->setFlash('success', Yii::$app->request->method);

        $context = ['model'=>$model, 'event'=>$event, 'places'=>$places, 'ticket'=>$ticket];

        return $this->render('buyticket', $context);
    }

    public function actionSetplace($id)
    {
        $requestData = Yii::$app->request->post();

        // Проверка, пришли ли данные вообще
        if (empty($requestData)) {
            $response = ['success' => false, 'message' => 'Данные не были получены', 'data'=>$requestData];
        } else {
            // Создание экземпляра вашей модели
            $model = new Ticket();

            // Присваивание данных модели
            if ($model->saveTicket()) {
                // Сохранение данных в модели
//                $model->save();
                $response = ['success' => true, 'message' => 'Данные успешно сохранены', 'data'=>$requestData];
            } else {
                $response = ['success' => false, 'message' => 'Ошибка при сохранении данных', 'errors'=>$model->errors, 'data'=>$requestData];
            }
        }

        // Отправка ответа в формате JSON
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $response;
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()))
        {
            Yii::$app->session->setFlash('primary', $model->errors);
            if ($model->saveUser())
            {
                return $this->goHome();
            }
        }

        return $this->render('signup', ['model'=>$model]);
    }
    public function actionNewevent()
    {
        $model = new \app\models\Events();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->upload()) {
                if ($model->save()) {
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('danger', 'save !validate');
                }
            } else {
                Yii::$app->session->setFlash('danger', 'upload !validate');
            }
        }

        return $this->render('newevent', [
            'model' => $model,
        ]);
    }

    public function actionTest()
    {
        $model = new Actors();

        return $this->render('test', ['model'=>$model]);
    }
    public function actionActors()
    {
        $query = Actor::find();
        $count = clone $query;
        $pages = new Pagination(['totalCount'=>$count->count(), 'pageSize'=>6]);

        $actors = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('actors', ['actors'=>$actors, 'pages'=>$pages]);
    }
    public function actionGalleryform()
    {
        $model = new Gallery();

        if ($model->load(Yii::$app->request->post()))
        {
            $model->image = UploadedFile::getInstances($model, 'image');
            if($model->upload())
            {
                if($model->saveGallery()){
                    return $this->refresh();
                }
            }
        }

        $context = ['model'=>$model];

        return $this->render('galleryform', $context);
    }
}
