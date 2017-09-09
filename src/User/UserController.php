<?php

namespace LRC\User;

/**
 * Controller for users.
 */
class UserController extends \LRC\App\BaseController
{
    /**
     * Login page.
     */
    public function login()
    {
        $user = $this->app->user->getCurrent();
        if ($user) {
            $this->app->view->add('user/index', ['user' => $user], 'main');
            $this->app->renderPage('Välkommen, ' . $user['username'] . '!');
        } else {
            $this->app->view->add('user/login', [], 'main');
            $this->app->renderPage('Logga in');
        }
    }
    
    
    /**
     * Log in.
     */
    public function handleLogin()
    {
        $username = $this->app->request->getPost('username', '');
        $password = $this->app->request->getPost('password', '');
        if ($username === '' || $password === '' || !$this->app->user->login($username, $password)) {
            $this->app->session->set('err', 'Felaktigt användarnamn eller lösenord.');
        }
        $this->app->redirect('user');
    }
    
    
    /**
     * Log out.
     */
    public function handleLogout()
    {
        if ($this->app->request->getPost('logout') == 1) {
            $this->app->user->logout();
            $this->app->session->set('msg', 'Du har loggats ut.');
        }
        $this->app->redirect('user');
    }
}
