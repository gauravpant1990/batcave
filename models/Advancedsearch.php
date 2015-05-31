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
		
		$term = trim(mysql_real_escape_string($_POST['query']));
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
		$sql = "SELECT * FROM `advancedSearch` WHERE Concat(comp, edu) like '%";
		$like_where_clause = implode("%' AND Concat(comp, edu) like '%",$splitted_terms);
		$sql = $sql.$like_where_clause."%'";
		$model = $connection->createCommand($sql);
		$data = $model->queryAll();
		return $data;
		//echo "<pre>";var_dump($data);return;
		//$num_all = mysql_num_rows(mysql_query($sql));

		//$total_pages_less_one = (int)($num_all/$search_per_page);
		/*if($total_pages_less_one > 0)
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
				$span = "<span class='page-number clickable";
				$span.=($i == $page)?" active'>":"'>";
				$span.=$i."</span>";
				echo $span;
			}
			echo "</div>";
		}

		$sql = $sql." LIMIT $search_start_from,$search_per_page";
		//        $num_all = mysql_num_rows(mysql_query($sql));
		//$sql = "SELECT * FROM `pay_slips` WHERE Concat(image_path, email) like \'%001%\' LIMIT 0, 30 ";
		$data = mysql_query($sql);
		//echo @mysql_ping() ? 'true' : 'false';

		if (!$data) {
			echo "Could not successfully run query ($sql) from DB: " . mysql_error();
			exit;
		}*/

		if (count($data) == 0) {
			echo "<span class='search_text'>We have your query, we will be back the data soon.</span>";
			exit;
		} else {
			//echo "<span class='search_text'>" . $num_all . " results found.</span>";
			print "<table border cellpadding=7 width=100% class='paginated'>";
			print "<tr class='header'>";
			print "<th >Company:</th>";//width=12%
			print "<th  >Designation:</th>";//width=12%
			print "<th >Salary:</th>";//width=8%
			print "<th >Experience:</th>";//width=8%
			print "<th >Year Passed<br/> Out:</th>";//width=8%
			print "<th >Education:</th>";//width=8%
			/*Print "<th width=15%>Skills:</th>"; */
			print "<th >Updated:</th>";//width=8%
			/*Print "<th width=8%>Active:</th>";
			Print "<th >ResID:</th>";*/
			print "<th >Gender:</th>";//width=8%
			

			foreach($data as $info) {
				print "<tr>";
				print '<td>' . $info['comp'] . "</td> ";
				print "<td>" . $info['desig'] . " </td>";
				print "<td>" . $info['sal'] . " </td>";
				print "<td>" . $info['exp'] . " </td>";
				print "<td>" . $info['ypass'] . " </td>";
				print "<td>" . $info['edu'] . " </td>";
				/*Print "<td>".$info['skills'] . " </td>"; */
				print "<td>" . $info['updated'] . " </td>";
				/* Print "<td>".$info['Active'] . " </td>";
				Print "<td>".$info['resid'] . " </td>"; */
				print "<td>" . $info['gender'] . " </td>";
			}

			print "</table>";
			print "<input type='hidden' id='search_term' value='$term'>";
		}
		}
	}
}
