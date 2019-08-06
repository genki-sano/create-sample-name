<?php

// 文字コード設定
header('Content-Type: text/html; charset=UTF-8');

// 名字生成用配列
$first_name = [
    ['', '山', '川', '谷', '田', '小', '石', '水', '大', '橋', '野', '池', '吉', '中'],
    ['田', '本', '川', '口', '野', '村', '崎', '山', '島', '上', '浦', '内', '原'],
    ['佐藤', '鈴木', '高橋', '田中', '伊藤', '渡辺', '中村', '小林', '加藤', '吉田', '山田', '佐々木', '山口', '松本', '井上', '木村', '林', '斎藤', '清水'] // 予備名字
];

// 名前生成用配列
$last_name = [
    ['順', '優', '恵', '浩', '裕', '正', '昭', '真', '純', '清', '博', '孝', '幸'],
    ['', '一', '二', '子', '美', '一郎', '実', '義', '夫', '雄', '太郎', '彦']
];

// 各配列の要素数を取得
$len_first_name1 = count($first_name[0]) - 1;
$len_first_name2 = count($first_name[1]) - 1;
$len_first_name3 = count($first_name[2]) - 1;
$len_last_name1  = count($last_name[0]) - 1;
$len_last_name2  = count($last_name[1]) - 1;

// 要素数の中で乱数値を生成
$seed_a = mt_rand(0, $len_first_name1);
$seed_b = mt_rand(0, $len_first_name2);
$seed_c = mt_rand(0, $len_last_name1);
$seed_d = mt_rand(0, $len_last_name2);

// 苗字を作成
$name_a = $first_name[0][$seed_a];
$name_b = $first_name[1][$seed_b];
// 例外処理（[2文字とも同じ文字] or [1文字目が空]の時に予備名字を使用）
if ($name_a === $name_b || !$name_a) {
    $seed_a = mt_rand(0, $len_first_name3);
    $name_a = $first_name[2][$seed_a];
    $name_b = '';
}

// 名前を作成
$name_c = $last_name[0][$seed_c];
$name_d = $last_name[1][$seed_d];

// 出力用に整形
$name['last']  = $name_a . $name_b;
$name['first'] = $name_c . $name_d;

// 日本語をunicode変換しないで出力
print json_encode($name, JSON_UNESCAPED_UNICODE);
