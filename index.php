<?php
$url = "https://wikinew.newkso.ru/wiki/astrocricket/mono.m3u8";

$headers = [
    "Referer: https://webxzplay.cfd",
    "Origin: https://webxzplay.cfd",
    "User-Agent: Mozilla/5.0"
];

$context = stream_context_create([
    "http" => [
        "header" => implode("\r\n", $headers)
    ]
]);

$data = @file_get_contents($url, false, $context);

if ($data === false) {
    http_response_code(500);
    echo "Failed to load stream.";
    exit;
}

header("Content-Type: application/vnd.apple.mpegurl");
header("Access-Control-Allow-Origin: *");
echo $data;
?>
