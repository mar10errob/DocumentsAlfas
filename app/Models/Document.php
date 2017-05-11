<?php

require_once(dirname(__FILE__). '/../Structure/Model.php');

class Document extends Model
{
    protected $table = 'documents';

    protected $fillabels = [
        'id',
        'user_id',
        'nameDocument',
        'title',
        'description',
    ];

}