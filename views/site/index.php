<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
$model = new \app\models\Data;
/*test comment*/
?>
<!--<div class="site-index">-->
<div>
<form id="queryForm" action="" onsubmit="loadData();return false;">
	<h1>Democratising Salaries</h1>
	<div class="search-box">	
<?php echo Html::input('text','query');
	echo Html::input('hidden','page_num');
?>
	</div>
	<p>Example: IIM, McKinsey, Analyst, or a combination.</p>
<?php echo Html::submitButton('Search', ['class'=>"btn btn-primary btn-xl page-scroll"] );
?>
</form>
<script>

function loadData(){
	$.ajax({
		type     :'POST',
		cache    : false,
		datatype : 'text',
		data     : $('#queryForm').serialize(),//input:text[name=query]
		url  : 'advancedsearch/search',
		success  : function(response) {
			//$('html').scrollTop($('#results').offset().top-50);
			$("html,body").animate({ scrollTop: $('#results').offset().top-50 }, "slow");
			$('#results').html(response);
		}
    });
}
function setPage(element){
	var page_num = element.html();
	$('input[name="page_num"]').val(page_num);
	loadData();
}
</script>
</div>
    <!--<div class="jumbotron">
    <h1>DEMOCRATIZING SALARY INFORMATION</h1>-->

	<?php /*$form = ActiveForm::begin([
		'method' => 'post',
		'action' => ['data/search'],
		'options' => ['style'=>'position:relative;top:25px']
	]); 
	//$form->options= ['position'=>'relative','top'=>'25px'];?>
	<?= $form->field($model, 'idcompany')->input('text',['style'=>'height:50px'])->label(false);?>
	<div class="form-group">
		<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
	</div>
	<?php 
	ActiveForm::end();*/?>
        <!--<p class="lead">You have successfully created your Yii-powered application.</p>-->

       <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>-->
<!--</div>-->
