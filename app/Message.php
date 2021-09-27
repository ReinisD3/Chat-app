<?php

namespace App;

class Message
{
    private string $nickname;
    private string $message;
    private string $dateTime;

    public function __construct(string $nickname, string $message, string $dateTime = '')
    {
        $this->nickname = $nickname;
        $this->message = $message;
        $this->dateTime = $dateTime;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
    public function getDateTime(): string
    {
        return $this->dateTime;
    }

}