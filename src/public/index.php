<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お問い合わせフォーム</title>
</head>
<body>
<div class="container">
<h2>お問い合わせフォーム</h2>
  <p>以下のフォームからお問い合わせください。</p>
  <form action="./complete.php" method="post">
    <table>
      <tr>
        <td>タイトル（必須）</td>
        <td><input name="title" colos="30" rows="10" placeholder="タイトル"></textarea></td>
      </tr>
      <tr>
        <td>Email（必須）</td>
        <td><input name="email" colos="30" rows="10" placeholder="Emailアドレス"></textarea></td>
      </tr>
      <tr>
      <td valign="top">お問い合わせ内容（必須）</td>
      <td><textarea name="content" cols="30" rows="10" placeholder="お問い合わせ内容（1000文字まで）をお書きください"></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit" name="button">送信</button></td>
      </tr>
    </table>
  </form>
</body>
