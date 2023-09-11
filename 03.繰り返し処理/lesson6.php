<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>
<?php
$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];

echo '<table border="1">';
echo '<tr><th></th>';

// 列ごとの合計を格納する配列
$colTotals = array('c1' => 0, 'c2' => 0, 'c3' => 0);

// 表を生成
$rowNames = array_keys($arr);
$colNames = array_keys(reset($arr));

echo '<tr><th></th>'; // 上部の空セル
foreach ($colNames as $colName) {
    echo '<th>' . $colName . '</th>';
}

echo '<th>横合計</th>'; // 横合計のセル

for ($i = 0; $i < count($rowNames); $i++) {
    echo '<tr>';
    echo '<th>' . $rowNames[$i] . '</th>';
    $rowTotal = 0;

    for ($j = 0; $j < count($colNames); $j++) {
        $value = $arr[$rowNames[$i]][$colNames[$j]];
        echo '<td>' . $value . '</td>';
        $rowTotal += $value;
        $colTotals[$colNames[$j]] += $value;
    }

    echo '<td>' . $rowTotal . '</td>';
    echo '</tr>';
}

echo '<tr><th>縦合計</th>';
$grandTotal = 0;

foreach ($colTotals as $colTotal) {
    echo '<td>' . $colTotal . '</td>';
    $grandTotal += $colTotal;
}

echo '<td>' . $grandTotal . '</td>';
echo '</tr>';

echo '</table>';
?>

</body>
</html>