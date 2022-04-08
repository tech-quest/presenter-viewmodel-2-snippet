<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\UseCase\UseCaseInput\ContactHistoryInput;
use App\UseCase\UseCaseInteractor\ContactHistoryInteractor;
use App\Adapter\Presenter\ContactHistoryPresenter;
use App\Domain\ValueObject\SearchWord;

$inputSearchWord = filter_input(INPUT_GET, 'searchWord');
$searchWord = new SearchWord($inputSearchWord);
$contactHistoryInput = new ContactHistoryInput($searchWord);
$contactHistoryInteractor = new ContactHistoryInteractor($contactHistoryInput);
$historyPresenter = new ContactHistoryPresenter(
    $contactHistoryInteractor->handler()
);
$contacts = $historyPresenter->createHistoryView();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>送信履歴</title>
</head>

  <body>
    <div class="container">
      <form method="get" action="./history.php">
        <div>
        <input name="searchWord" type="text" value="<?php echo $inputSearchWord ??
            ''; ?>" placeholder="キーワードを入力" />
        <input type="submit" value="検索" />
        </div>
      </form>

      <h2>送信履歴</h2>
      <?php foreach ($contacts as $contact): ?>
        <h3><?php echo $contact['title']; ?></h3>
        <p><?php echo $contact['content']; ?></p>
        <?php endforeach; ?>
        <a href = "./index.php">戻る</a>
    </div>
  </body>
</html>

