<?php
function knapSack($W, $wt, $val, $n) {
    $K = array_fill(0, $n + 1, array_fill(0, $W + 1, 0));

    for ($i = 0; $i <= $n; $i++) {
        for ($w = 0; $w <= $W; $w++) {
            if ($i == 0 || $w == 0)
                $K[$i][$w] = 0;
            elseif ($wt[$i - 1] <= $w)
                $K[$i][$w] = max($val[$i - 1] + $K[$i - 1][$w - $wt[$i - 1]], $K[$i - 1][$w]);
            else
                $K[$i][$w] = $K[$i - 1][$w];
        }
    }

    return $K[$n][$W];
}

$val = array(60, 100, 120);
$wt = array(10, 20, 30);
$W = 50;
$n = count($val);

$result = knapSack($W, $wt, $val, $n);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>0/1 Knapsack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">0/1 Knapsack</h1>
        <p class="text-center">The maximum value that can be put in a knapsack of capacity <?php echo $W; ?> is: <strong><?php echo $result; ?></strong></p>
    </div>
</body>
</html>
