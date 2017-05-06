<?php
namespace App\Models;

use App\Structure\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillables = [
        'nameDocument',
        'title',
        'description',
    ];
}