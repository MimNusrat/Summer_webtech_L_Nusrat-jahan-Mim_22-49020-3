<!DOCTYPE html>
<html>
<head>
    <title>PHP Practice Tasks</title>
</head>
<body>
    <h2>1. Sum of the elements of an array</h2>
    <?php
        $arr = [5, 10, 15, 20, 25];
        $sum = array_sum($arr);
        echo "Array: [ " . implode(", ", $arr) . " ]<br>";
        echo "Sum = $sum";
    ?>

    <h2>2. Find the second maximum number of an array</h2>
    <?php
        $arr2 = [12, 45, 67, 23, 89, 34];
        rsort($arr2); // Sort in descending order
        echo "Array: [ " . implode(", ", $arr2) . " ]<br>";
        echo "Second maximum = " . $arr2[1];
    ?>

    <h2>3. Generate a Right-Angled Star Triangle</h2>
    <?php
        $rows = 5;
        for ($i = 1; $i <= $rows; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo "* ";
            }
            echo "<br>";
        }
    ?>

    <h2>4. Reverse a String</h2>
    <?php
        $str = "Hello PHP";
        $rev = strrev($str);
        echo "Original: $str <br>";
        echo "Reversed: $rev";
    ?>

    <h2>5. Separate vowels and consonants of a word</h2>
    <?php
        $word = "Programming";
        $vowels = "";
        $consonants = "";
        $letters = str_split(strtolower($word));

        foreach ($letters as $ch) {
            if (in_array($ch, ['a','e','i','o','u'])) {
                $vowels .= $ch . " ";
            } elseif (ctype_alpha($ch)) {
                $consonants .= $ch . " ";
            }
        }

        echo "Word: $word <br>";
        echo "Vowels: $vowels <br>";
        echo "Consonants: $consonants";
    ?>
</body>
</html>
