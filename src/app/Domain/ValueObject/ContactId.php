<?php
namespace App\Domain\ValueObject;

/**
 * お問合せのid用のValueObject
 */
final class ContactId
{
    /**
     * お問合せのタイトルが不正な場合のエラーメッセージ
     */
    const INVALID_MESSAGE = 'idが不適切な値です。';

    /**
     * @var int
     */
    private $value;

    /**
     * コンストラクタ
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        if ($this->isInvalid($value)) {
            throw new Exception(self::INVALID_MESSAGE);
        }
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }

    /**
     * お問合せのidのバリデーション
     *
     * @param int $value
     * @return boolean
     */
    private function isInvalid(string $value): bool
    {
        return $value <= 0;
    }
}
