<?php

namespace LRC\Book;

use \LRC\Common\BaseModel;
use \LRC\Common\ValidationTrait;
use \LRC\Common\ValidationInterface;

/**
 * Book model class.
 */
class Book extends BaseModel implements ValidationInterface
{
    use ValidationTrait;
    
    
    public $id;
    public $title;
    public $author;
    public $published;
    public $isbn;
    public $language;
    
    
    public function __construct()
    {
        $this->setNullables(['published', 'isbn', 'language']);
        $this->setValidation([
            'title' => [
                [
                    'rule' => 'required',
                    'message' => 'Titel måste anges.'
                ],
                [
                    'rule' => 'maxlength',
                    'value' => 200,
                    'message' => 'Titeln får vara maximalt 200 tecken lång.'
                ]
            ],
            'author' => [
                [
                    'rule' => 'required',
                    'message' => 'Författare måste anges.'
                ],
                [
                    'rule' => 'maxlength',
                    'value' => 200,
                    'message' => 'Författaren får vara maximalt 200 tecken lång.'
                ]
            ],
            'published' => [
                [
                    'rule' => 'number',
                    'message' => 'Publiceringsåret måste vara numeriskt.'
                ]
            ],
            'isbn' => [
                [
                    'rule' => 'maxlength',
                    'value' => 13,
                    'message' => 'ISBN-koden får vara maximalt 13 tecken lång.'
                ]
            ],
            'language' => [
                [
                    'rule' => 'maxlength',
                    'value' => 50,
                    'message' => 'Språket får vara maximalt 50 tecken långt.'
                ]
            ]
        ]);
    }
}
