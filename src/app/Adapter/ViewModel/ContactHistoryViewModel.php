<?php
namespace App\Adapter\ViewModel;

/**
 *
 */
final class ContactHistoryViewModel
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
     *
     *
     * @return array
     */
    public function convertToWebView(): array
    {
        $contactEntityList = $this->contactHistoryOutput->handler();
        $contactHistoryForWeb = [];
        foreach ($contactEntityList as $contactEntity) {
            $contactHistoryForWeb[]['id'] = $contactEntity->id()->value();
            $contactHistoryForWeb[]['title'] = $contactEntity->title()->value();
            $contactHistoryForWeb[]['email'] = $contactEntity->email()->value();
            $contactHistoryForWeb[]['content'] = $contactEntity->content();
        }
        return $contactHistoryForWeb;
    }
}
