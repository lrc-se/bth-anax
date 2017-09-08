<?php

namespace LRC\User;

/**
 * User service.
 */
class UserService
{
    /**
     * @var \Anax\Session $session inject a reference to the session.
     */
    private $session;
    
    /**
     * @var string $key to use when storing in session.
     */
    const KEY = 'users';


    /**
     * Inject dependencies.
     *
     * @param array $dependency key/value array with dependencies.
     *
     * @return self
     */
    public function inject($dependency)
    {
        $this->session = $dependency['session'];
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
        foreach ($this->session->get(self::KEY, []) as $user) {
            if ($user['id'] === $id) {
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
        foreach ($this->session->get(self::KEY, []) as $user) {
            if ($user['anonymous'] == 1 && $user['name'] === $name && $user['email'] === $email) {
                return $user;
            }
        }
        return null;
    }
    

    /**
     * Add a user.
     *
     * @param string $user  The user.
     *
     * @return array        The new user inserted.
     */
    public function addUser($user)
    {
        $users = $this->session->get(self::KEY, []);
        
        // Get next available value for the id
        $ids = array_column($users, 'id');
        $user['id'] = (empty($ids) ? 1 : max($ids) + 1);
        
        $users[] = $user;
        $this->session->set(self::KEY, $users);
        return $user;
    }
}
