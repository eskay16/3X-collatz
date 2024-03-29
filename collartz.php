<?php
include("./class.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
<style>
.histogram {
	display: flex;
	align-items: flex-end;
	min-height: 100px;
}
.bar {
	background-color: navy;
	margin-right: 2px;
	color: white;
	padding: 2px 5px 15px 5px;
}
</style>
</head>

<body>


	<form action="./" method="GET">
		<input type="number" name="collatzNo" placeholder="Number" required>
		<input type="submit" name="calcForm" value="Calculate">
	</form>

	<?php
	if (isset($_GET["calcForm"])) {
		$coltz = $_GET["collatzNo"];

		if ($coltz <= 0) {
			echo "Negative Number or Zero not Allowed";
		} else {
			$userObj = new collOOP();
			$userObjArr = $userObj->sequencGen($coltz);

			foreach ($userObjArr as $ob) {
				echo $ob . ", ";
			}

			echo "<br>";
			$itr = count($userObjArr) - 1;

			echo "Number of Iterations: " . $itr . "<br>";

			$highAtt = $userObj->highestFind($userObjArr);

			echo "Highest attained: " . $highAtt;
		}
	}
	?>

	<hr />

<form action="./" method="GET">
    min number: <input type="number" name="collatzNo1" required><br>
    max number: <input type="number" name="collatzNo2" required><br> 
    <input type="submit" name="calcFormrange" value="Calculate">
    <input type="submit" name="Arithmethbutton" value="With Arithmetic Progression">
  </form>

	<?php
	if (isset($_GET["calcFormrange"]) && isset($_GET["calcFormrange"])) {

    $min = $_GET["collatzNo1"];
    $max = $_GET["collatzNo2"];
    if ($min <= 0 || $max <= 0) {
      echo "Negative Number or Zero not Allowed";
    } else {
		$userObj2 = new collOOP();
		$userObjArr2 = $userObj2->calculate_range($min, $max);
		
		$newItrArr = array();
		foreach($userObjArr2 as $ax){
			$newItrArr[] = $ax["iteration"];
		}
		
		$hsObj = new myHistogram();
		$histoArr = $hsObj->showHist($newItrArr);
		ksort($histoArr);
		
		echo "
			<div class='histogram'>
		";
		
		foreach($histoArr as $indArr => $arrVal){
			echo "
				<div class='bar' style='height:".$arrVal."0px;'>".$indArr.":".$arrVal."</div>
			";
		}
		
		echo "</div><p>[x:y]</p>";
		
			echo "
				<br>
				<table>
					<tr>
						<th>Number</th>
						<th>Maximum Value</th>
						<th>iterations</th>
					</tr>
			";
			foreach ($userObjArr2 as $tbl) {
				echo "<tr>";
				echo "<td>";
				echo $tbl["number"];
				echo "</td>";
				echo "<td>";
				echo $tbl["highest_number"];
				echo "</td>";
				echo "<td>";
				echo $tbl["iteration"];
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";

			$maxIterate = 0;

			foreach ($userObjArr2 as $jbl) {
				if ($jbl["iteration"] > $maxIterate) {
					$maxIterate = $jbl["iteration"];
				}
			}

			$minIterate = $maxIterate;

			foreach ($userObjArr2 as $jbl) {
				if ($jbl["iteration"] < $minIterate) {
					$minIterate = $jbl["iteration"];
				}
			}

			echo "For maximum iteration";

			echo "<br>";

			echo "
				<table>
					<tr>
						<th>Number</th>
						<th>Maximum Value</th>
						<th>iterations</th>
					</tr>
			";

			foreach ($userObjArr2 as $jbl) {
				$iterVal = $jbl["iteration"];
				if ($iterVal == $maxIterate) {
					echo "
						<tr>
							<td>" . $jbl["number"] . "</td>
							<td>" . $jbl["highest_number"] . "</td>
							<td>" . $jbl["iteration"] . "</td>
						</tr>
					";
				}
			}

			echo "</table>";
			echo "<br>";

			echo "
					For minimum iteration 
				<table>
					<tr>
						<th>Number</th>
						<th>Maximum Value</th>
						<th>iterations</th>
					</tr>
			";

			foreach ($userObjArr2 as $jbl) {
				$interVall = $jbl["iteration"];
				if ($interVall == $minIterate) {
					echo "
						<tr>
							<td>" . $jbl["number"] . "</td>
							<td>" . $jbl["highest_number"] . "</td>
							<td>" . $jbl["iteration"] . "</td>
						</tr>
					";
				}
			}
			echo "</table>";
		}
		
	}
	
	

	?>
	<?php
	if (isset($_GET["Arithmethbutton"])) {
		$min = $_GET["collatzNo1"];
		$max = $_GET["collatzNo2"];
		$userObj3 = new collOOP();
		$userObj3 = new collOOP();
		$progressmulti = $userObj3->arithmeticProgress($min, $max);

		echo "
        <table>
            <tr>
                <th>Number</th>
                <th>Highest Attained</th>
                <th>Iterations</th>
            </tr>
    ";

		foreach ($progressmulti as $number) {
			$sequence = $userObj3->sequencGen($number);
			$highest = $userObj3->highestFind($sequence);
			$iterations = count($sequence) - 1;

			echo "
            <tr>
                <td>{$number}</td>
                <td>{$highest}</td>
                <td>{$iterations}</td>
            </tr>
        ";
		}

		echo "</table>";
		$maxArith_iterate = 0;
		foreach ($progressmulti as $number) {
			$sequence = $userObj3->sequencGen($number);
			$highest = $userObj3->highestFind($sequence);
			$iterations = count($sequence) - 1;
			if ($iterations >= $maxArith_iterate) {
				$maxArith_iterate = $iterations;
			}
		}
		$minArith_iterate = $maxArith_iterate;
		foreach ($progressmulti as $number) {
			$sequence = $userObj3->sequencGen($number);
			$highest = $userObj3->highestFind($sequence);
			$iterations = count($sequence) - 1;
			if ($minArith_iterate >= $iterations) {
				$minArith_iterate = $iterations;
			}
		}

		echo "<hr>";
		echo "lowest iteration: " . $minArith_iterate . " HIghest iteration: " . $maxArith_iterate;
		echo "<br> The arithmetic progression is calculated with the multiplication of 3";
		
		
	}
	?>

</body>

</html>