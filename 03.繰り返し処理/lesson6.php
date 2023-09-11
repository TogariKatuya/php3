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
// ここにテーブル表示
echo '<table>';

// ヘッダ行を生成
echo '<tr>';
echo '<th></th>'; // 空セル
foreach ($arr['r1'] as $key => $value) {
    echo '<th>' . $key . '</th>';
}
echo '<th>横合計</th>';
echo '</tr>';

// データ行を生成
$totalRow = array();
foreach ($arr as $rowName => $rowData) {
    echo '<tr>';
    echo '<th>' . $rowName . '</th>';
    $rowTotal = 0;
    foreach ($rowData as $value) {
        echo '<td>' . $value . '</td>';
        $rowTotal += $value;
    }
    $totalRow[] = $rowTotal; // 各行の合計を保存
    echo '<td>' . $rowTotal . '</td>';
    echo '</tr>';
}

// 縦合計行を生成
echo '<tr>';
echo '<th>縦合計</th>';
$totalSum = 0;
foreach ($totalRow as $value) {
    echo '<td>' . $value . '</td>';
    $totalSum += $value;
}
echo '<td>' . $totalSum . '</td>';
echo '</tr>';

echo '</table>';

?>
</body>
</html>