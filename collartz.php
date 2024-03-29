<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="http://localhost:4000/Desktop/collartzhw/collartz.php" method="POST">
        collatz: <input type="number" name="collatzNo"><br>
        <button>Calculate</button>
    </form>

    <?php
    if (empty($_POST["collatzNo"])) {
    } elseif ($_POST["collatzNo"] < 0) {
        echo "Negative Number not Allowed";
    } else {
        $result = $_POST["collatzNo"];
        $i = 0;
        $test = $result;
        do {
            echo $result . "<br>";

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
        echo "$result <br>";
        echo "Highest attained $test <br>";
        echo "Number of iteration: $i";
    }
    ?>
    <form action="http://localhost:4000/Desktop/collartzhw/collartz.php" method="POST">
        min number: <input type="number" name="collatzNo1"><br>
        max number: <input type="number" name="collatzNo2">
        <button>Calculate</button>
    </form>
    <?php
    include 'function.php';
    if (empty($_POST["collatzNo1"]) || empty($_POST["collatzNo2"])) {

    } elseif ($_POST["collatzNo1"] < 0 || ($_POST["collatzNo2"]) < 0) {
        echo "Negative Number not Allowed";
    } else {
        $min = $_POST["collatzNo1"];
        $max = $_POST["collatzNo2"];
        calculate($min, $max);
    }
    ?>
</body>

</html>