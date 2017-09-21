<?php

namespace LRC\User;

/**
 * User service.
 */
class UserService extends \LRC\Common\BaseService
{
    /**
     * @var User    Current logged-in user.
     */
    private $curUser = null;
    
    
    /**
     * Get a user by ID.
     *
     * @param int $id       User ID.
     *
     * @return User|null    User model instance if found, null otherwise.
     */
    public function getById($id)
    {
        return ($this->di->users->find('id', $id) ?: null);
    }
    
    
    /**
     * Get a user by username.
     *
     * @param string $username  Username.
     *
     * @return User|null        User model instance if found, null otherwise.
     */
    public function getByUsername($username)
    {
        return ($this->di->users->find('username', $username) ?: null);
    }
    
    
    /**
     * Get an anonymous user by name and e-mail address.
     *
     * @param string $name      User name.
     * @param string $email     User e-mail.
     *
     * @return User|null        User model instance if found, null otherwise.
     */
    public function getAnonymous($name, $email)
    {
        return ($this->di->users->findFirst('username IS NULL AND name = ? AND email = ?', [$name, $email]) ?: null);
    }
    
    
    /**
     * Get the currently logged-in user, if any.
     * 
     * @return User|null    User model instance if found, null otherwise.
     */
    public function getCurrent()
    {
        if (!$this->curUser && $this->di->session->has('userId')) {
            $this->curUser = $this->getById($this->di->session->get('userId'));
        }
        return $this->curUser;
    }
    

    /**
     * Add an anonymous user.
     *
     * @param string $name  User name.
     * @param string $email User e-mail.
     *
     * @return User         The new user inserted.
     */
    public function addAnonymous($name, $email)
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->admin = 0;
        $this->di->users->save($user);
        return $user;
    }
    
    
    /**
     * Attempt to log in a user.
     *
     * @param string $username  Username.
     * @param string $password  Password.
     *
     * @return bool             True if login was successful, false otherwise.
     */
    public function login($username, $password)
    {
        $user = $this->getByUsername($username);
        if ($user && $user->verifyPassword($password)) {
            $this->di->session->set('userId', $user->id);
            return true;
        }
        return false;
    }
    
    
    /**
     * Log out the current user.
     */
    public function logout()
    {
        $this->di->session->delete('userId');
        $this->curUser = null;
    }
}
