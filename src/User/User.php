<?php

namespace LRC\User;

/**
 * User model class.
 */
class User extends \LRC\Common\BaseModel
{
    use \LRC\Common\ValidationTrait;
    
    
    public $id;
    public $username;
    public $password;
    public $name;
    public $email;
    public $admin;
    public $deleted;
    
    
    public function __construct()
    {
        $this->setNullables(['username', 'password', 'email', 'deleted']);
        $this->setValidation([
            'username' => [
                [
                    'rule' => 'required',
                    'message' => 'Användarnamn måste anges.'
                ],
                [
                    'rule' => 'maxlength',
                    'value' => 25,
                    'message' => 'Användarnamnet får vara maximalt 25 tecken långt.'
                ]
            ],
            'password' => [
                [
                    'rule' => 'required',
                    'message' => 'Lösenord måste anges.'
                ],
                [
                    'rule' => 'minlength',
                    'value' => 8,
                    'message' => 'Lösenordet måste vara minst 8 tecken långt.'
                ]
            ],
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
            ]
        ]);
    }
    
    
    /**
     * Hash the password (call this before saving to database).
     */
    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }
    
    
    /**
     * Verify hashed password.
     *
     * @param string $password  Password to verify against stored hash.
     *
     * @return bool             True if password matches, false otherwise.
     */
    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }
}
