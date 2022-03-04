<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $errors[] = 'post送信になっていません！';
}

$title = filter_input(INPUT_POST, 'title');
$email = filter_input(INPUT_POST, 'email');
$content = filter_input(INPUT_POST, 'content');
if (empty($title) || empty($email) || empty($content)) {
    $errors[] =
        '「タイトル」「Email」「お問い合わせ内容」のどれかが記入されていません！';
}

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:dbname=contactform;host=mysql;charset=utf8',
    $dbUserName,
    $dbPassword
);

$sql =
    'INSERT INTO `contacts` (`id`, `title`, `email`, `content`) VALUES (0, :title, :email, :content)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->execute();

if (empty($errors)) {
    $message = '送信完了！！！';
    $links = '
      <a href="./index.php">
        <p>送信画面へ</p>
      </a>
      <a href="./history.php">
        <p>送信履歴をみる</p>
      </a>
    ';
} else {
    $links = '
        <a href="./index.php">
          <p>送信画面へ</p>
        </a>
      ';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>送信完了画面</title>
</head>

<body>
  <div class="container">
    <?php if (!empty($errors)): ?>
      <?php foreach ($errors as $error): ?>
        <p><?php echo $error . "\n"; ?></p>
      <?php endforeach; ?>
      <?php echo $links; ?>
    <?php endif; ?>

    <?php if (empty($errors)): ?>
      <?php
      echo '<h2>' . $message . '</h2>';
      echo $links;
      ?>
    <?php endif; ?>
  </div>
</body>

</html>