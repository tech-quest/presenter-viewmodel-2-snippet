<?php
namespace App\Domain\Entity;
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Domain\ValueObject\ContactId;
use App\Domain\ValueObject\ContactTitle;
use App\Domain\ValueObject\Email;

final class Contact
{
    private $id;
    private $title;
    private $email;
    private $content;

    public function __construct(
        ?ContactId $id,
        contactTitle $title,
        Email $email,
        string $content
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->email = $email;
        $this->content = $content;
    }

    public function id(): ?ContactId
    {
        return $this->id;
    }

    public function title(): contactTitle
    {
        return $this->title;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function content(): string
    {
        return $this->content;
    }
}
