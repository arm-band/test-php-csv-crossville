<?php

date_default_timezone_set('Asia/Tokyo');
mb_language('ja');
mb_internal_encoding('UTF-8');

// CSRF対策
if(!isset($_POST['token']) || empty($_POST['token'])) {
    echo 'トークンがありません。不正な処理です。';
    exit();
}
session_start();
if(session_id() !==  $_POST['token']){
    echo 'トークンが一致しません。不正な処理です。';
    exit();
}

// data
$rows = [
    [
        "CSV",
        "KCSV",
        "",
        "Crossville Memorial-Whitson Field",
        "アメリカ"
    ],
    [
        "ASV",
        "HKAM",
        "",
        "Amboseli Airport",
        "ケニア"
    ],
    [
        "DSV",
        "KDSV",
        "",
        "Dansville Municipal Airport",
        "アメリカ"
    ],
    [
        "HSV",
        "KHSV",
        "ハンツビル国際空港",
        "Huntsville International Airport",
        "アメリカ"
    ],
    [
        "KSV",
        "YSPV",
        "",
        "Springvale Airport",
        "Queensland",
        "オーストラリア"
    ],
    [
        "LSV",
        "KLSV",
        "ネリス空軍基地",
        "Nellis Air Force Base",
        "アメリカ"
    ],
    [
        "MSV",
        "KMSV",
        "",
        "Sullivan County International Airport",
        "アメリカ"
    ],
    [
        "SSV",
        "",
        "",
        "Siasi Airport",
        "フィリピン"
    ],
    [
        "TSV",
        "YBTL",
        "タウンズビル空港",
        "Townsville Airport",
        "オーストラリア"
    ],
    [
        "YSV",
        "CYSV",
        "",
        "Saglek Airport",
        "カナダ"
    ],
];

// path
$file_path = 'crossville.csv';

// response header
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename*=UTF-8\'\'' . rawurlencode($file_path));

// export
$fp = fopen('php://output', 'w');
foreach($rows as $val) {
    fputcsv($fp, $val, ',', '"', '\\');
}
fclose($fp);

exit();
