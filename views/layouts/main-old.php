<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
    <title><?= Html::encode((strpos($_SERVER['HTTP_HOST'],"6figr")!==false ? "6 figure" : "Kitna deti hai")); ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

	<!--<link rel="icon" href="img/favicon.png" type="image/png">-->

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/search.css" type="text/css">
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-51952369-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>

<body id="page-top">
<?php $this->beginBody() ?>
<?php
            NavBar::begin([
                'brandLabel' => (strpos($_SERVER['HTTP_HOST'],"6figr")!==false ? "6 FIGURE" : "KITNA DETI HAI"),//Yii::$app->name,
                'brandUrl' => "#page-top",//Yii::$app->homeUrl,
				'brandOptions' => ['class'=>'page-scroll'],
                'options' => [
                    'class' => 'navbar navbar-default navbar-fixed-top ',//navbar-inverse navbar-fixed-top affix-top
					'id' => 'mainNav'
                ],
				'innerContainerOptions' => [
					'class' => 'container-fluid'
				]
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    //['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => '#about', 'linkOptions'=>['class'=>'page-scroll']],
                    ['label' => 'People Speak', 'url' => '#people-speak', 'linkOptions'=>['class'=>'page-scroll']],
					['label' => 'Contact', 'url' => '#contact', 'linkOptions'=>['class'=>'page-scroll']],
                    Yii::$app->user->isGuest ?
                        //['label' => 'Login', /*'url' => ['/site/login'],*/ 'options'=> ['onclick' => 'IN.User.authorize(LI)']] :
						/*("<li>".yii\authclient\widgets\AuthChoice::widget(['baseAuthUrl' => ['site/auth'],
							'popupMode' => false,
							"options"=>['style'=>"position:relative;overflow:hidden;top:2px;margin-left:7px"]])."</li>"):*/
						['label' => 'Login', 'url' => ['site/auth?authclient=linkedin']]:
                        ['label' => 'Logout (' . Yii::$app->user->identity->firstName . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
			//previous header classes: container
        ?>

	<header>
        <div class="header-content">
			<div class="header-content-inner">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
			</div>
        </div>
	</header>
	
	<div id="results" ></div><!--style = "display: none; height: 500px"-->
	
    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
					<div class="videoWrapper">
						<iframe src="http://player.vimeo.com/video/112695115" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
					
                    
                    <hr class="light">
				</div>
				<div class = "col-lg-10 col-lg-offset-1 text-center">
                    <p class="about-text text-faded">Our bread earning salaries have remained a taboo subject for generations. This community aims to remove the taboo and enable people to make informed choices about their career by giving access to actual salaries & payslips of companies across levels. You will never have to rely on false numbers quoted by media and other speculative information to make important career decisions.</p>
                </div>
            </div>
        </div>
    </section>
<?php if(Yii::$app->user->isGuest){?>
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Why Sign Up?</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
				<div class = "col-lg-10 col-lg-offset-1 text-center">
					<p>We won't post anything on your behalf.<br>Access to a data set with thousands of detailed Salary values.<br>We can suggest opportunities that exactly match your profile with detailed salary values!</p>
					<a href="/site/auth?authclient=linkedin"><img src="img/linkedin.png"></img></a>
				</div>
            </div>
        </div>
    </section>
<?php } ?>
    <section class="" id="people-speak">
		<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">PEOPLE SPEAK</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-6 col-sm-6">
                    <a class="portfolio-box">
					   <p style = "background: url('img/portfolio/Rajesh.png') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">A simple Quora search on Glassdoor salaries would tell you how inaccurate their salaries are .. (see here). Thanks KDH for such accurate, relevant, and updated information.</p>
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    
                                </div>
                                <div class="project-name">
                                    Data Scientist
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <a class="portfolio-box">
						<p  style = "background: url('img/portfolio/Leonard.jpg') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">Within a company and a designation, salaries largely vary based of No of years of Experience, School where one studied, Skill sets of the person, Highest Degree and year of passing out. High time someone paid attention to it.</p>
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    
                                </div>
                                <div class="project-name">
                                    Software Developer
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <a class="portfolio-box">
						<p style = "background: url('img/portfolio/amy.png') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">Wish this site existed before I entered a B-School, I would have had much more clear picture on take home salaries as against Inflated CTC figures quoted on Media. Leaving my ill informed parents and relatives disappointed when I quote my salary.</p>
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    
                                </div>
                                <div class="project-name">
                                    Recent MBA Graduate
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <a class="portfolio-box">
						<p style = "background: url('img/portfolio/howard.png') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">If only had I known my exact take home salary, I would have rather taken General management jobs - I could have avoided all that slogging. And when you are overworked, all you do on weekends is to sleep so my 2 lac golf course membership quoted in my CTC is a joke.</p>
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    
                                </div>
                                <div class="project-name">
                                    Management Consultant
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <a class="portfolio-box">
						<p style = "background: url('img/portfolio/bernadette.jpg') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">I was a little worried about pursuing my dream and creating a career out in Advertising would not be financially rewarding - Thanks to KDH. I came across entry level compensation with which I would be more than happy.</p>
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    
                                </div>
                                <div class="project-name">
                                    Advertising Aspirant
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <a class="portfolio-box">
                        <!--<img src="img/portfolio/6.jpg" class="img-responsive" alt="">
						<img class="people-image" src="img/portfolio/EricCartman.png" class="img-responsive" alt="">-->
						<p style = "background: url('img/portfolio/SheldonCooper.png') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">Thanks KDH, You saved me from a huge financially debt called Study Loan ;) I was contemplating on an 1 year Indian MBA, And hoped it had a decent ROI .. The kind of insights which I could find on KDH made me realise financially I could be touching that take home salary in 2years by just continuing my job in IT itself.</p>
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    
                                </div>
                                <div class="project-name">
                                    Product Manager
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

	<section id="map" class="map">
        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/fusiontables/embedviz?q=select+col0+from+1nXFXgeL9A9DhFKoZhD8ZCqm7MaiB33nsyjlsA5Xa&viz=MAP&h=false&lat=26&lng=-10&t=1&z=3&l=col0&y=2&tmplt=2&hml=ONE_COL_LAT_LNG"></iframe>
        <br />
        <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
        </small>
        </iframe>
    </section>
	
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">CONTACT US</h2>
                    <hr class="primary">
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
					<form method="POST" action="">
					   <input class="contact" type="text" id="contact_name" placeholder="Enter your name here"></input>
					   <input class="contact" type="text" id="contact_email" required="" placeholder="Enter your email-id here"></input>
					   <textarea class="contact" id="contact_message" rows="5" required="" placeholder="Enter your message here"></textarea>
					   <div id="recaptcha" class="captcha"><img src="img/image.jpg"></div>
					   <input class="contact" type="text" id="recaptcha_response_field" required="" placeholder="Enter the words shown in the image above"></input>
					   <button class="btn btn-primary btn-xl page-scroll">Send Mail</button>
					</form>   
                </div>
            </div>
        </div>
    </section>
	<section id="copyright">
		<div class="container">
			<div class="row">
				<a href="https://kitnadetihai.in/VinCi/index.html" target="_blank">
					<div class="col-lg-6 col-lg-offset-3 text-center">
						<img src="img/rsz_logo_vinci.png"></img>
						<span>VinCi Labs</span>
					</div>
				</a>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 text-center">
					<p> Copyright © 2014-2015, VinCi Labs. All Rights Reserved. Your use of this service is subject to our Terms of Use and Privacy Policy. </p>
				</div>
			</div>
		</div>
	</section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>
	
	<!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/mfp.js"></script>
	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
	<script src="js/report.js" charset="utf-8"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
