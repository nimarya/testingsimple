<?php

namespace App\Entities;

use Nimarya\Simple\Entities\Model;

class Author extends Model
{
    const TABLE = 'authors';
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }
}
