<?php
namespace App\Domain\ValueObject;
use \Exception;

/**
 * お問合せのEmail用のValueObject
 */
final class Email
{
    /**
     * お問合せのEmailが不正な場合のエラーメッセージ
     */
    const INVALID_MESSAGE = 'Emailが不正です！';

    /**
     * @var string
     */
    private $value;

    /**
     * コンストラクタ
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        if ($this->isInvalid($value)) {
            throw new Exception(self::INVALID_MESSAGE);
        }
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * お問合せのタイトルのバリデーション
     *
     * @param string $value
     * @return boolean
     */
    private function isInvalid(string $value): bool
    {
        return !filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
