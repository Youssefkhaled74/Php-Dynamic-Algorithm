<?php
function lcs($X, $Y, $m, $n) {
    $L = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

    for ($i = 0; $i <= $m; $i++) {
        for ($j = 0; $j <= $n; $j++) {
            if ($i == 0 || $j == 0)
                $L[$i][$j] = 0;
            elseif ($X[$i - 1] == $Y[$j - 1])
                $L[$i][$j] = $L[$i - 1][$j - 1] + 1;
            else
                $L[$i][$j] = max($L[$i - 1][$j], $L[$i][$j - 1]);
        }
    }

    return $L[$m][$n];
}

$X = "AGGTAB";
$Y = "GXTXAYB";
$m = strlen($X);
$n = strlen($Y);

$result = lcs($X, $Y, $m, $n);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Longest Common Subsequence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Longest Common Subsequence</h1>
        <p class="text-center">Length of LCS is: <strong><?php echo $result; ?></strong></p>
    </div>
</body>
</html>
