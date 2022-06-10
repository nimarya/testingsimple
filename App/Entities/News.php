<?php

namespace App\Entities;

use Nimarya\Simple\Entities\Model;
use Nimarya\Simple\Entities\Config;
use Nimarya\Simple\Entities\DataBase;
use Nimarya\Simple\Exceptions\MultiException;

class News extends Model
{
    const TABLE = 'news';
    protected string $heading;
    protected string $content;
    public int|null $author_id;
    //do not change accessability of heading and content

    public function __get(string $key): Author|null
    {
        if ($key == 'author') {
            $config = Config::make();
            $database = DataBase::make($config->dsn, $config->login, $config->password);

            return Author::getById($this->author_id, $database);
        }
        if ($key != 'author') {
            return null;
        }
    }

    public function __isset(string $key): bool
    {
        if ($key == 'author') {
            return true;
        }
        if ($key != 'author') {
            return false;
        }
    }

    public static function createNew(string $heading, string $content): void
    {
        $new = new News();
        $new->heading = $heading;
        $new->content = $content;

        $new->insert();
        echo 'your record is successfully saved!';
    }

    public function getHeading(): string
    {
        return $this->heading;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setHeading(string $heading): void
    {
        $this->heading = $heading;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
