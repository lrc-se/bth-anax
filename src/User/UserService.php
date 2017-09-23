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
        return ($this->di->users->getFirst('username IS NULL AND name = ? AND email = ?', [$name, $email]) ?: null);
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
     * Create user from model-bound form.
     *
     * @param \LRC\Form\ModelForm   $form       Model-bound form.
     * @param bool                  $isAdmin    Whether the insert is performed from the admin panel.
     *
     * @return bool                             True if the insert was performed, false if validation failed.
     */
    public function createFromForm($form, $isAdmin = false)
    {
        $user = $form->populateModel();
        $form->validate();
        if ($user->password !== $form->getExtra('password2')) {
            $form->addError('password', 'Lösenorden stämmer inte överens.');
            $form->addError('password2', 'Lösenorden stämmer inte överens.');
        }
        if ($this->getByUsername($user->username)) {
            $form->addError('username', 'Användarnamnet är upptaget.');
        }
        
        if ($form->isValid()) {
            if (!$isAdmin) {
                $user->admin = 0;
            }
            $user->hashPassword();
            $this->di->users->save($user);
            return true;
        }
        return false;
    }
    
    
    /**
     * Update user from model-bound form.
     *
     * @param \LRC\Form\ModelForm   $form       Model-bound form.
     * @param User                  $oldUser    Model instance of existing user.
     * @param bool                  $isAdmin    Whether the update is performed from the admin panel.
     *
     * @return bool                             True if the update was performed, false if validation failed.
     */
    public function updateFromForm($form, $oldUser, $isAdmin = false)
    {
        $user = $form->populateModel();
        $user->id = $oldUser->id;
        $user->username = $oldUser->username;
        if (is_null($user->password)) {
            $user->password = $oldUser->password;
            $form->validate();
        } else {
            $form->validate();
            if ($user->password === $form->getExtra('password2')) {
                $user->hashPassword();
            } else {
                $form->addError('password', 'Lösenorden stämmer inte överens.');
                $form->addError('password2', 'Lösenorden stämmer inte överens.');
            }
        }
        
        if ($form->isValid()) {
            if (!$isAdmin) {
                $user->admin = $oldUser->admin;
            }
            $this->di->users->save($user);
            return true;
        }
        return false;
    }
    
    
    /**
     * Register anonymous user from model-bound form.
     *
     * @param \LRC\Form\ModelForm   $form       Model-bound form.
     * @param User                  $oldUser    Model instance of existing user.
     *
     * @return bool                             True if the update was performed, false if validation failed.
     */
    public function registerAnonymousFromForm($form, $oldUser)
    {
        $user = $form->populateModel();
        $user->id = $oldUser->id;
        $user->name = $oldUser->name;
        $user->email = $oldUser->email;
        $form->validate();
        if ($user->password !== $form->getExtra('password2')) {
            $form->addError('password', 'Lösenorden stämmer inte överens.');
            $form->addError('password2', 'Lösenorden stämmer inte överens.');
        }
        if ($this->getByUsername($user->username)) {
            $form->addError('username', 'Användarnamnet är upptaget.');
        }
        
        if ($form->isValid()) {
            $user->admin = 0;
            $user->hashPassword();
            $this->di->users->save($user);
            return true;
        }
        return false;
    }
    
    
    /**
     * Delete a user.
     *
     * @param User $user    User model instance.
     */
    public function delete($user)
    {
        $this->di->users->deleteSoft($user);
    }
    
    
    /**
     * Restore a deleted user.
     *
     * @param User $user    User model instance.
     */
    public function restore($user)
    {
        $this->di->users->restoreSoft($user);
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
        if ($user && !$user->deleted && $user->verifyPassword($password)) {
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
