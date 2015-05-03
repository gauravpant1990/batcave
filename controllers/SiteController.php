<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\authclient\AuthAction;
use yii\authclient\OAuth2;
use app\models\User;
use app\models\KdhUser;
use app\models\Personaldetail;

class SiteController extends Controller
{
	public $successUrl;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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
			'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
				'successUrl' => $this->successUrl
            ],
        ];
    }

    public function actionIndex()
    {
		return $this->render('index');
    }

    public function actionLogin()
    {
		//IN.ENV.auth.oauth_token
		//$search = new KdhUserSearch();
		//$user = $search->search(['linkedInID' => $_GET['id']]);
		//var_dump($user);
		
		Yii::$app->user->loginByAccessToken($_GET['id'],get_class($this));return;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		
        /*$model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }*/
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function successCallback($client)
    {
		$attributes = $client->getUserAttributes();
		//Yii::$app->session->set('picUrl',$attributes['three-past-positions']);
		var_dump($attributes['industry']);return;
        $auth = User::find()->where([
            'linkedInID' => $attributes['id'],
        ])->one();
        Yii::$app->session->set('linkedInAttributes',($attributes['educations']['@attributes']['total']));
        if (Yii::$app->user->isGuest) {
            if ($auth) { // login
                Yii::$app->user->login($auth,3600*24*30);
            } else { // signup
                if (isset($attributes['email']) && Personaldetail::find()->where(['email' => $attributes['email']])->exists()) {
                    Yii::$app->getSession()->setFlash('error', [
                        Yii::t('app', "User with the same email as in {client} account already exists but isn't linked to it. Login using email first to link it.", ['client' => $client->getTitle()]),
                    ]);
                } else {
					$details = new Personaldetail([
						'email' => $attributes['email'],
						'pictureUrl' => $attributes['picture-urls']['picture-url']
					]);
					
                    $user = new User([
                        'firstName' => $attributes['first-name'],
                        'lastName' => $attributes['last-name'],
						'linkedInID' => $attributes['id'],
						'profileURL' => $attributes['public-profile-url'],
						'numConnections' => $attributes['num-connections']
                    ]);
                    if ($user->save()) {
						$details->link('user',$user);
						$skills = new \app\models\Skill;
						$skills->addSkills($attributes['skills']['skill'], $user);
						$educationCount = $attributes['educations']['@attributes']['total'];
						$education = new \app\models\Education;
						$education->addEducations($attributes['educations']['education'],(int)$educationCount,$user->iduser);//return;
						$location = new \app\models\Location;
						$location->addLocation($attributes['location'],$user);
						$job = new \app\models\Job;
						$job->addJobs($attributes['three-past-positions'],$attributes['three-current-positions'],$user);
						$industry = new \app\models\Industry;
						$industry->addIndustry($attributes['industry'],$user);
						if($details->save())
						{
							return $this->redirect(['personaldetail/update', 'model'=>$details ,'user' => $user,'id'=>$details->idpersonalDetail]);
						}			
                    } else {
                        print_r($user->getErrors());
                    }
                }
            }
        } else { // user already logged in
            if (!$auth) { // add auth provider
                $auth = new Auth([
                    'user_id' => Yii::$app->user->id,
                    'source' => $client->getId(),
                    'source_id' => $attributes['id'],
                ]);
                $auth->save();
            }
        }
    }
}
