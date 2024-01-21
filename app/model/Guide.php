<?php

namespace model;

class Guide implements \JsonSerializable
{
    private int $guide_id;

    private string $author;

    private string $title;

    private string $content;

    private string $date_published;

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}
