<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<script type="text/javascript" src="http://platform.linkedin.com/in.js">
		api_key: 750f0hg4dgw4kx
		authorize: true
	</script>
	<script>
		function LI() 
		{
			 IN.API.Profile("me").fields(["id"]).result(function(result) {
				var id = result.values[0].id;
				window.location = '/site/login?id='+id;	
			 });
		}
	</script>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        //['label' => 'Login', /*'url' => ['/site/login'],*/ 'options'=> ['onclick' => 'IN.User.authorize(LI)']] :
						("<li>".yii\authclient\widgets\AuthChoice::widget(['baseAuthUrl' => ['site/auth'],
							'popupMode' => false,
							"options"=>['style'=>"position:relative;overflow:hidden;top:2px;margin-left:7px"]])."</li>"):
                        ['label' => 'Logout (' . Yii::$app->user->identity->firstName . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
<?php echo "<pre>"; var_dump(Yii::$app->session->get('demo'));//var_dump(Yii::$app->session->get('linkedInAttributes'));
//var_dump(Yii::$app->kdhUser->findOne(Yii::$app->user->id)->personaldetail); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
