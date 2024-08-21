<?php
function matrixChainOrder($p, $n) {
    $m = array_fill(0, $n, array_fill(0, $n, 0));

    for ($L = 2; $L < $n; $L++) {
        for ($i = 1; $i < $n - $L + 1; $i++) {
            $j = $i + $L - 1;
            $m[$i][$j] = PHP_INT_MAX;
            for ($k = $i; $k <= $j - 1; $k++) {
                $q = $m[$i][$k] + $m[$k + 1][$j] + $p[$i - 1] * $p[$k] * $p[$j];
                if ($q < $m[$i][$j]) {
                    $m[$i][$j] = $q;
                }
            }
        }
    }
    return $m[1][$n - 1];
}

$p = array(1, 2, 3, 4);
$n = count($p);

$result = matrixChainOrder($p, $n);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Chain Multiplication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Matrix Chain Multiplication</h1>
        <p class="text-center">The minimum number of multiplications is: <strong><?php echo $result; ?></strong></p>
    </div>
</body>
</html>
