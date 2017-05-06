<?php

include(dirname(__FILE__). '/../Structure/Model.php');

class Document extends Model
{
    protected $table = 'documents';

    protected $fillables = [
        'nameDocument',
        'title',
        'description',
    ];

}