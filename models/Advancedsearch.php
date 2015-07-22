<?php

namespace app\models;
use yii\db\Query;

use Yii;

/**
 * This is the model class for table "advancedsearch".
 *
 * @property string $comp
 * @property string $desig
 * @property string $sal
 * @property string $exp
 * @property string $location
 * @property string $ypass
 * @property string $edu
 * @property string $skills
 * @property string $updated
 * @property string $Active
 * @property string $resid
 * @property string $gender
 * @property string $last_updated
 * @property string $metaData
 * @property string $name
 * @property string $previousDesig
 * @property string $previousComp
 * @property string $desig_visible
 */
class Advancedsearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advancedsearch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comp', 'desig', 'sal', 'exp', 'ypass', 'edu', 'skills', 'updated', 'Active', 'resid', 'gender', 'last_updated', 'metaData', 'desig_visible'], 'required'],
            [['comp', 'desig', 'sal', 'exp', 'ypass', 'skills', 'updated', 'Active', 'resid', 'metaData', 'desig_visible'], 'string', 'max' => 100],
            [['location', 'name', 'previousDesig', 'previousComp'], 'string', 'max' => 60],
            [['edu'], 'string', 'max' => 200],
            [['gender'], 'string', 'max' => 10],
            [['last_updated'], 'string', 'max' => 20],
            [['comp', 'desig', 'skills'], 'unique', 'targetAttribute' => ['comp', 'desig', 'skills'], 'message' => 'The combination of Comp, Desig and Skills has already been taken.'],
            [['skills', 'updated', 'resid'], 'unique', 'targetAttribute' => ['skills', 'updated', 'resid'], 'message' => 'The combination of Skills, Updated and Resid has already been taken.'],
            [['comp', 'desig', 'skills'], 'unique', 'targetAttribute' => ['comp', 'desig', 'skills'], 'message' => 'The combination of Comp, Desig and Skills has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comp' => Yii::t('app', 'Comp'),
            'desig' => Yii::t('app', 'Desig'),
            'sal' => Yii::t('app', 'Sal'),
            'exp' => Yii::t('app', 'Exp'),
            'location' => Yii::t('app', 'Location'),
            'ypass' => Yii::t('app', 'Ypass'),
            'edu' => Yii::t('app', 'Edu'),
            'skills' => Yii::t('app', 'Skills'),
            'updated' => Yii::t('app', 'Updated'),
            'Active' => Yii::t('app', 'Active'),
            'resid' => Yii::t('app', 'Resid'),
            'gender' => Yii::t('app', 'Gender'),
            'last_updated' => Yii::t('app', 'Last Updated'),
            'metaData' => Yii::t('app', 'Meta Data'),
            'name' => Yii::t('app', 'Name'),
            'previousDesig' => Yii::t('app', 'Previous Desig'),
            'previousComp' => Yii::t('app', 'Previous Comp'),
            'desig_visible' => Yii::t('app', 'Desig Visible'),
        ];
    }
	
	function processNeedle($text)
	{
		$output = array();
		$output2 = array();
		$arr[] = $text;
		for ($i=0;$i<count($arr);$i++)
	   	{
	   		if ($i%2==0)
	       	{
	        	$output=array_merge($output,explode(" ",$arr[$i]));
				$output=str_replace("\\","",$output);
	       	}
	       	else $output[] = str_replace("\\","",$arr[$i]);
	   	}
		foreach($output as $word)
		{
			if (trim($word)!="") $output2[]=$word;
		}
	   	return $output2;
  	}
	
	public function search($query)
	{
		$connection = Yii::$app->db;
		
		$term = trim(mysql_escape_string($_POST['query']));
		//$term= \Yii::$app->db->quoteValue($_POST['query']);
		$splitted_terms = $this->processNeedle($term);
		//$sql = "INSERT INTO `user_searches`(search_term,userid) values('$term', '{$_SESSION['linked_userid']}')";
		//mysql_query($sql);

		if(!preg_match("/.{3,}$/",$term))
		{
			echo '<span class="search_text">Your search term was too short (minimum of 3 non-numeric characters).</span>' .
					'<br/><br/>';
			return;
		}

		if (strlen($term) <= 2) {
		if ($term != '') {
			print '<span class="search_text">Your search term was too short (minimum of 3 non-numeric characters).</span>' .
				'<br/><br/>';
		}
		} else {
		print '<span class="search_text">You searched for: </span><span class="search_term">"' .
			$term . '"</span><br/><br/>';
		$sqlCount = "SELECT count(*) FROM `advancedsearch` WHERE Concat(comp, edu) like '%";
		$sql = "SELECT * FROM `advancedsearch` WHERE Concat(comp, edu) like '%";
		$like_where_clause = implode("%' AND Concat(comp, edu) like '%",$splitted_terms);
		$sqlCount = $sqlCount.$like_where_clause."%' LIMIT 100";
		$sql = $sql.$like_where_clause."%'";
		$modelCount = $connection->createCommand($sqlCount);
		
		$count = $modelCount->queryAll();
		$num_all = (int)$count[0]["count(*)"];
		if($num_all>100) $num_all = 100;
		
		$page = ($_POST['page_num']!='')?((int)$_POST['page_num']):1;
		$search_per_page = 10;
		$search_start_from = ($page-1)*$search_per_page;
		//var_dump($search_start_from);
		$total_pages_less_one = (int)($num_all/$search_per_page);
		if($total_pages_less_one > 0)
		{
			$balance_results = $num_all - ($total_pages_less_one*$search_per_page);
			if($balance_results > 0)
			{
				$total_pages = $total_pages_less_one + 1;
			}
			else
			{
				$total_pages = $total_pages_less_one;
			}
			echo "<div class='pager'>";
			for($i=1;$i<=$total_pages;$i++)
			{
				$span = "<span onclick='setPage($(this))' class='page-number clickable";
				$span.=($i == $page)?" active'>":"'>";
				$span.=$i."</span>";
				echo $span;
			}
			echo "</div>";
		}
//var_dump($search_start_from,$search_per_page);return;
		$sql = $sql." LIMIT $search_start_from,$search_per_page";
		//        $num_all = mysql_num_rows(mysql_query($sql));
		//$sql = "SELECT * FROM `pay_slips` WHERE Concat(image_path, email) like \'%001%\' LIMIT 0, 30 ";
		$model = $connection->createCommand($sql);
		$data = $model->queryAll();
		//echo @mysql_ping() ? 'true' : 'false';

		if (!$data) {
			echo "Could not successfully run your query" ;//. mysql_error()
			exit;
		}/**/
		return $data;
		}
	}
}
