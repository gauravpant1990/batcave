<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
if (count($data) == 0) {
			echo "<span class='search_text'>We have your query, we will be back the data soon.</span>";
			exit;
		} else {
			//echo "<span class='search_text'>" . $num_all . " results found.</span>";
			print "<table border cellpadding=7 width=100% class='paginated table table-bordered table-striped'>";
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
			//print "<input type='hidden' id='search_term' value='$term'>";
		}

