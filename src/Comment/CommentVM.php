<?php

namespace LRC\Comment;

use \LRC\Common\BaseModel;
use \LRC\Common\ValidationTrait;
use \LRC\Common\ValidationInterface;

/**
 * View model for comment posting.
 */
class CommentVM extends BaseModel implements ValidationInterface
{
    use ValidationTrait;
    
    
    public $contentId;
    public $name;
    public $email;
    public $text;
    
    
    public function __construct()
    {
        $this->setNullables(['email']);
        $this->setValidation([
            'name' => [
                [
                    'rule' => 'required',
                    'message' => 'Namn måste anges.'
                ],
                [
                    'rule' => 'maxlength',
                    'value' => 100,
                    'message' => 'Namnet får vara maximalt 100 tecken långt.'
                ]
            ],
            'email' => [
                [
                    'rule' => 'maxlength',
                    'value' => 200,
                    'message' => 'E-postadressen får vara maximalt 200 tecken lång.'
                ],
                [
                    'rule' => 'email',
                    'message' => 'E-postadressen är ogiltig.'
                ]
            ],
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
