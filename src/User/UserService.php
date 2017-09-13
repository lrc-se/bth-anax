<?php

namespace LRC\User;

/**
 * User service.
 */
class UserService extends \LRC\Common\BaseService
{
    /**
     * @var string $key to use when storing in session.
     */
    const KEY = 'users';


    /**
     * Mock data.
     *
     * @return self
     */
    public function mock()
    {
        if (!$this->getByUsername('admin')) {
            $this->addUser([
                'username' => 'admin',
                'password' => '$2y$10$28ANwequzg1BryIAwdXrt.D65WjRjxQHC35mYSXlA2/6KQMUA0.dS',
                'name' => 'Admin',
                'email' => 'kabc16@student.bth.se',
                'anonymous' => 0,
                'admin' => 1
            ]);
        }
        if (!$this->getByUsername('doe')) {
            $this->addUser([
                'username' => 'doe',
                'password' => '$2y$10$5NG8.RGSS/0HZ3lN6PUx7eVFAj10AW8/HMOj6tzV3GhmWuY8SnFCa',
                'name' => 'John Doe',
                'email' => 'e@mail.com',
                'anonymous' => 0,
                'admin' => 0
            ]);
        }
        return $this;
    }


    /**
     * Get a user by ID.
     *
     * @param string $id    User ID.
     *
     * @return array|null   Array with the user if found, null otherwise.
     */
    public function getById($id)
    {
        foreach ($this->di->session->get(self::KEY, []) as $user) {
            if ($user['id'] == $id) {
                return $user;
            }
        }
        return null;
    }
    
    
    /**
     * Get a user by username.
     *
     * @param string $username  Username.
     *
     * @return array|null       Array with the user if found, null otherwise.
     */
    public function getByUsername($username)
    {
        foreach ($this->di->session->get(self::KEY, []) as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }
        return null;
    }
    
    
    /**
     * Get an anonymous user by name and e-mail address.
     *
     * @param string $name      User name.
     * @param string $email     User e-mail.
     *
     * @return array|null       Array with the user if found, null otherwise.
     */
    public function getAnonymous($name, $email)
    {
        foreach ($this->di->session->get(self::KEY, []) as $user) {
            if ($user['anonymous'] == 1 && $user['name'] === $name && $user['email'] === $email) {
                return $user;
            }
        }
        return null;
    }
    
    
    /**
     * Get the currently logged-in user, if any.
     * 
     * @return array|null   Array with the user if found, null otherwise.
     */
    public function getCurrent()
    {
        if ($this->di->session->has('userId')) {
            return $this->getById($this->di->session->get('userId'));
        }
        return null;
    }
    

    /**
     * Add a user.
     *
     * @param array $user   The user.
     *
     * @return array        The new user inserted.
     */
    public function addUser($user)
    {
        $users = $this->di->session->get(self::KEY, []);
        
        // Get next available value for the id
        $ids = array_column($users, 'id');
        $user['id'] = (empty($ids) ? 1 : max($ids) + 1);
        
        $users[] = $user;
        $this->di->session->set(self::KEY, $users);
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
        foreach ($this->di->session->get(self::KEY, []) as $user) {
            if ($user['username'] === $username && password_verify($password, $user['password'])) {
                $this->di->session->set('userId', $user['id']);
                return true;
            }
        }
        return false;
    }
    
    
    /**
     * Log out the current user.
     */
    public function logout()
    {
        $this->di->session->delete('userId');
    }
}
