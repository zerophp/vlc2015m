<?php

include ('fibonacci.php');
$max = 36;
$serie = fibonacci($max);

echo "<pre>Input: ".$max;
print_r($serie);
echo "</pre>";