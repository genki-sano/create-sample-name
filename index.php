<?php

// 文字コード設定
header('Content-Type: application/json; charset=UTF-8');

// 名字生成用配列
$first_name[1] = ['', '山', '川', '谷', '田', '小', '石', '水', '大', '橋', '野', '池', '吉', '中'];
$first_name[2] = ['田', '本', '川', '口', '野', '村', '崎', '山', '島', '上', '浦', '内', '原'];
// 予備名字
$first_name[3] = ['佐藤', '鈴木', '高橋', '田中', '伊藤', '渡辺', '中村', '小林', '加藤', '吉田', '山田', '佐々木', '山口', '松本', '井上', '木村', '林', '斎藤', '清水'];

// 名前生成用配列
$last_name[1] = ['順', '優', '恵', '浩', '裕', '正', '昭', '真', '純', '清', '博', '孝', '幸'];
$last_name[2] = ['', '一', '二', '子', '美', '一郎', '実', '義', '夫', '雄', '太郎', '彦'];

// 苗字を作成
$name_a = $first_name[1][array_rand($first_name[1])];
$name_b = $first_name[2][array_rand($first_name[2])];
// 例外処理（[2文字とも同じ文字] or [1文字目が空] の時に予備名字を使用）
if ($name_a === $name_b || empty($name_a)) {
    $name_a = $first_name[3][array_rand($first_name[3])];
    $name_b = '';
}

// 名前を作成
$name_c = $last_name[1][array_rand($last_name[1])];
$name_d = $last_name[2][array_rand($last_name[2])];

// 出力用に整形
$name['last_name']  = $name_a . $name_b;
$name['first_name'] = $name_c . $name_d;

// 日本語をunicode変換しないで出力
print json_encode($name, JSON_UNESCAPED_UNICODE);
