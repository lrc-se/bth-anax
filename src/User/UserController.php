<?php

namespace LRC\User;

/**
 * Controller for users.
 */
class UserController extends \LRC\Common\BaseController
{
    /**
     * Login page.
     */
    public function login()
    {
        $user = $this->di->user->getCurrent();
        if ($user) {
            $this->di->view->add('user/index', ['flash' => 'img/bg4.jpg', 'user' => $user], 'main');
            $this->di->common->renderPage('Välkommen, ' . $user->username . '!', null, ['flash' => 'img/bg4.jpg']);
        } else {
            $this->di->view->add('user/login', [], 'main');
            $this->di->common->renderPage('Logga in', null, ['flash' => 'img/bg4.jpg']);
        }
    }
    
    
    /**
     * Log in.
     */
    public function handleLogin()
    {
        $username = $this->di->request->getPost('username', '');
        $password = $this->di->request->getPost('password', '');
        if ($username === '' || $password === '' || !$this->di->user->login($username, $password)) {
            $this->di->session->set('err', 'Felaktigt användarnamn eller lösenord.');
        }
        $this->di->common->redirect('user');
    }
    
    
    /**
     * Log out.
     */
    public function handleLogout()
    {
        if ($this->di->request->getPost('logout') == 1) {
            $this->di->user->logout();
            $this->di->session->set('msg', 'Du har loggats ut.');
        }
        $this->di->common->redirect('user');
    }
}
