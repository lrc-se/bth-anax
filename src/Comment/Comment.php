<?php

namespace LRC\Comment;

use \LRC\Common\BaseModel;
use \LRC\Common\ValidationTrait;
use \LRC\Common\ValidationInterface;

/**
 * Comment model class.
 */
class Comment extends BaseModel implements ValidationInterface
{
    use ValidationTrait;
    
    
    public $id;
    public $contentId;
    public $userId;
    public $editorId;
    public $text;
    public $created;
    public $updated;
    
    
    public function __construct()
    {
        $this->setNullables(['editorId', 'updated']);
        $this->setValidation([
            'text' => [
                [
                    'rule' => 'required',
                    'message' => 'Kommentar måste anges.'
                ],
                [
                    'rule' => 'maxlength',
                    'value' => 2000,
                    'message' => 'Kommentaren får vara maximalt 2000 tecken lång.'
                ]
            ]
        ]);
    }
}
