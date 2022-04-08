<?php
namespace App\Adapter\Presenter;
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Adapter\ViewModel\ContactHistoryViewModel;

/**
 * お問い合わせ履歴の全件表示のコントローラ
 */
final class ContactHistoryPresenter
{
    /**
     * @var ContactHistoryOutput
     */
    private $contactHistoryOutput;

    /**
     * コンストラクタ
     */
    public function __construct($contactHistoryOutput)
    {
        $this->contactHistoryOutput = $contactHistoryOutput;
    }

    /**
     * お問い合わせ履歴の全件表示処理
     *
     * @return array
     */
    public function createHistoryView(): array
    {
        $contactHistoryViewModel = new ContactHistoryViewModel(
            $this->contactHistoryOutput
        );
        return $contactHistoryViewModel->convertToWebView();
    }
}
