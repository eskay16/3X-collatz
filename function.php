<?php
function calculate($min, $max)
{
    $table = array();
    for ($a = $min; $a <= $max; $a++) {
        $result = $test = $a;
        $i = 0;
        do {
            if ($result % 2 == 0)
                $result = $result / 2;
            else {
                $result = ($result * 3) + 1;
            }

            if ($result > $test) {
                $test = $result;
            }
            $i++;
        } while ($result != 1);
        array_push($table, $a, $test, $i);
    }
    echo "<strong>";
    echo "RESULTS: <br>";
    echo "</strong>";
    $maxiteration = $table[2];
    $miniteration = $table[2];
    for ($r = 2; $r < count($table); $r = $r + 3) {
        $table[$r];
        if ($table[$r] > $maxiteration) {
            $maxiteration = $table[$r];

        }
        if ($table[$r] < $miniteration) {
            $miniteration = $table[$r];
        }

    }
    echo "<table>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Maximum Value</th>";
    echo "<th>iterations</th>";
    echo "</tr>";
    for ($i = 2; $i < count($table); $i += 3) {
        echo "<tr>";
        echo "<td>";
        echo $table[$i - 2];
        echo "</td>";
        echo "<td>";
        echo $table[$i - 1];
        echo "</td>";
        echo "<td>";
        echo $table[$i];
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<fieldset style='width: 500px'>";
    echo "Minimum iteration is $miniteration and Maximum iteration is $maxiteration";
    echo "</fieldset>";

    echo "<strong>";
    echo "Maximum iterations: <br>";
    echo "</strong>";


    echo "<table>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Maximum Value</th>";
    echo "<th>iterations</th>";
    echo "</tr>";
    for ($i = 2; $i < count($table); $i = $i + 3) {
        if ($table[$i] == $maxiteration) {
            echo "<tr>";
            echo "<td>";
            echo $table[$i - 2];
            echo "</td>";
            echo "<td>";
            echo $table[$i - 1];
            echo "</td>";
            echo "<td>";
            echo $maxiteration;
            echo "</td>";
            echo "</tr>";
            break;
        }
    }
    echo "</table>";

    echo "<strong>";
    echo "Minimum iterations: <br>";
    echo "</strong>";

    echo "<table>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Maximum Value</th>";
    echo "<th>iterations</th>";
    echo "</tr>";
    for ($d = 2; $d < count($table); $d = $d + 3) {
        if ($table[$d] == $miniteration) {
            echo "<tr>";
            echo "<td>";
            echo $table[$d - 2];
            echo "</td>";
            echo "<td>";
            echo $table[$d - 1];
            echo "</td>";
            echo "<td>";
            echo $miniteration;
            echo "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";

    return $table;

}
?>