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
                    ['label' => 'About', 'url' => '#about', 'linkOptions'=>['class'=>'about-page']],
                    ['label' => 'People Speak', 'url' => '#people-speak', 'linkOptions'=>['class'=>'page-scroll']],
					['label' => 'Contact', 'url' => '#contact', 'linkOptions'=>['class'=>'contact-page']],
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
<div class="chart" style="display: none"></div>

<!-- About Us -->
<section id="about" class="white-popup-block mfp-hide">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <div class="videoWrapper">
                    <iframe src="http://player.vimeo.com/video/112695115" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Login -->
<section id="login" class="white-popup-block mfp-hide">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="mfp-section-heading">LinkedIn Login</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class = "col-lg-10 col-lg-offset-1 text-center">
                <a><img src="img/linkedin.png"></img></a>
            </div>
        </div>
    </div>
</section>
<!-- Contact -->
<section id="contact" class="white-popup-block mfp-hide">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="mfp-section-heading">CONTACT US</h2>
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
<section id="how_kdh_works" class="white-popup-block mfp-hide">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="mfp-section-heading">HOW KDH WORKS</h2>
                <hr class="primary">
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <a><img style="width: 100%" src="img/how-kdh-works.png"></img></a>
            </div>
        </div>
    </div>
</section>

<!--milestones-->

<section class="" id="people-speak">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">MILESTONES</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-lg-3 col-sm-3">
                <a class="portfolio-box">
                    <p style = "background: url('img/iima-logo.jpg') no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0)"></p>
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">

                            </div>
                            <div class="project-name">
                                Profiled as a case study at IIMA on salary transparency
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-3">
                <a class="portfolio-box">
                    <p  style = "background: url('img/isb-logo.jpg') no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0)"></p>
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">

                            </div>
                            <div class="project-name">
                                80% of the class of 800 used KitnaDetiHai during their placements to negotiate better deals.
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-3">
                <a class="portfolio-box">
                    <p style = "background: url('img/till-date.PNG') no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0)"></p>
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">

                            </div>
                            <div class="project-name">
                                13k+ searches, 32+ counties, 130+ cities.
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-3">
                <a class="portfolio-box">
                    <p style = "background: url('img/ET-logo.jpg') no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0)"></p>
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">

                            </div>
                            <div class="project-name" onclick = "open_article()">
                                Click here to open the Economic Times article
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- milestones-->




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
                    <p style = "background: url('img/portfolio/data-scientist.png') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">A simple Quora search on Glassdoor salaries would tell you how inaccurate their salaries are .. (see here). Thanks KDH for such accurate, relevant, and updated information.</p>
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
                    <p  style = "background: url('img/portfolio/software-developer.png') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">Within a company and a designation, salaries largely vary based of No of years of Experience, School where one studied, Skill sets of the person, Highest Degree and year of passing out. High time someone paid attention to it.</p>
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
                    <p style = "background: url('img/portfolio/recent-mba-graduate.jpg') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">Wish this site existed before I entered a B-School, I would have had much more clear picture on take home salaries as against Inflated CTC figures quoted on Media. Leaving my ill informed parents and relatives disappointed when I quote my salary.</p>
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
                    <p style = "background: url('img/portfolio/management-consultant.png') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">If only had I known my exact take home salary, I would have rather taken General management jobs - I could have avoided all that slogging. And when you are overworked, all you do on weekends is to sleep so my 2 lac golf course membership quoted in my CTC is a joke.</p>
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
                    <p style = "background: url('img/portfolio/adasp.jpg') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">I was a little worried about pursuing my dream and creating a career out in Advertising would not be financially rewarding - Thanks to KDH. I came across entry level compensation with which I would be more than happy.</p>
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
                    <p style = "background: url('img/portfolio/product-manager.jpg') no-repeat scroll 0 0 / 100px auto rgba(0, 0, 0, 0)">Thanks KDH, You saved me from a huge financially debt called Study Loan ;) I was contemplating on an 1 year Indian MBA, And hoped it had a decent ROI .. The kind of insights which I could find on KDH made me realise financially I could be touching that take home salary in 2years by just continuing my job in IT itself.</p>
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
    <h4 class='sign_header' style="text-align:center">Who is making most out of it?</h4>
    <input type="button" onclick="$('.overlay').css('z-index',-1);$(this).css('z-index',-1)" value="Enable Map" style="position: relative; width: 164px; height: 54px; top: 300px; left: 45%; z-index: 2;">
    <div class="overlay" onclick="style.pointerEvents=none" style="
    background: transparent;
    position: relative;
    width: 100%;
    height: 600px;
    margin-top: -600px;
    top: 600px;
"></div>
    <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/fusiontables/embedviz?q=select+col0+from+1nXFXgeL9A9DhFKoZhD8ZCqm7MaiB33nsyjlsA5Xa&viz=MAP&h=false&lat=26&lng=-10&t=1&z=3&l=col0&y=2&tmplt=2&hml=ONE_COL_LAT_LNG"></iframe>
    <br />
    <small>
        <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
    </small>
    </iframe>
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
                <p> Copyright © 2013-2014, VinCi Labs. All Rights Reserved. Your use of this service is subject to our Terms of Use and Privacy Policy. </p>
            </div>
        </div>
    </div>
</section>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<!--<script src="js/bootstrap.min.js"></script>-->

<!-- Plugin JavaScript
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.fittext.js"></script>
<script src="js/wow.min.js"></script>-->

<!-- Custom Theme JavaScript-->
<!--<script src="js/creative.js"></script>-->
<!--<script src="js/jquery.magnific-popup.min.js"></script>-->
<!--<script src="js/mfp.js"></script>-->
<!--<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>-->
<!--<script src="js/report.js" charset="utf-8"></script>-->
<!--<script>-->
<!--    console.info('hello');-->
<!--</script>-->
<script>
    function loadjscssfile(filename, filetype){
        if (filetype=="js"){ //if filename is a external JavaScript file
            var fileref=document.createElement('script')
            fileref.setAttribute("type","text/javascript")
            fileref.setAttribute("src", filename)
        }
        else if (filetype=="css"){ //if filename is an external CSS file
            var fileref=document.createElement("link")
            fileref.setAttribute("rel", "stylesheet")
            fileref.setAttribute("type", "text/css")
            fileref.setAttribute("href", filename)
        }
        if (typeof fileref!="undefined")
            document.getElementsByTagName("head")[0].appendChild(fileref)
    }
    $(document).ready(function(){
        loadjscssfile("js/jquery.easing.min.js")
        loadjscssfile("js/jquery.fittext.js", "js") //dynamically load and add this .js file
        loadjscssfile("js/wow.min.js", "js") //dynamically load and add this .js file
        loadjscssfile("js/creative.js", "js") //dynamically load and add this .js file
        loadjscssfile("js/jquery.magnific-popup.min.js","js");
        loadjscssfile("js/mfp.js","js");
    });

</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
