<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("不正なアクセスです");
}

$name    = trim($_POST["name"] ?? "");
$email   = trim($_POST["email"] ?? "");
$message = trim($_POST["message"] ?? "");

if ($name === "" || $email === "" || $message === "") {
    exit("入力内容に不備があります");
}

$date = date("Y-m-d H:i:s");
$data = [$date, $name, $email, $message];

$file = "contact.csv";

$fp = fopen($file, "a");
fputcsv($fp, $data);
fclose($fp);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>送信完了</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light d-flex justify-content-center align-items-center" style="height:100vh;">
  <div class="text-center">
    <h2>送信完了</h2>
    <p class="mt-3">お問い合わせありがとうございました。</p>
    <a href="index.html" class="btn btn-primary mt-4">戻る</a>
  </div>
</body>
</html>
