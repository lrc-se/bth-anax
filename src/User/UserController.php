<?php

namespace LRC\User;

use \LRC\Common\BaseController;
use \LRC\Form\ModelForm as Form;

/**
 * Controller for users.
 */
class UserController extends BaseController
{
    /**
     * Profile page.
     */
    public function profile()
    {
        $user = $this->di->common->verifyUser();        
        $this->renderPage('user/index', ['user' => $user], 'Välkommen, ' . htmlspecialchars($user->username) . '!');
    }
    
    
    /**
     * Registration page.
     */
    public function create()
    {
        $this->renderPage('user/form', [
            'user' => null,
            'admin' => null,
            'update' => false,
            'form' => new Form('user-form', User::class)
        ], 'Registrera användare');
    }
    
    
    /**
     * Registration handler.
     */
    public function handleCreate()
    {
        $form = new Form('user-form', User::class);
        if ($this->di->user->createFromForm($form)) {
            $this->di->session->set('userId', $form->getModel()->id);
            $this->di->session->set('msg', 'Ditt användarkonto har skapats.');
            $this->di->common->redirect('user/profile');
        }
        
        $this->renderPage('user/form', [
            'user' => $form->getModel(),
            'admin' => null,
            'update' => false,
            'form' => $form
        ], 'Registrera användare');
    }
    
    
    /**
     * Edit profile page.
     *
     * @param int $id   User ID.
     */
    public function update($id)
    {
        $user = $this->di->common->verifyUser();
        if ($user->id != $id) {
            $this->di->session->set('err', 'Du har inte behörighet att redigera den begärda profilen.');
            $this->di->common->redirect('user/profile');
        }
        
        $this->renderPage('user/form', [
            'user' => $user,
            'admin' => null,
            'update' => true,
            'form' => new Form('user-form', $user)
        ], 'Redigera profil');
    }
    
    
    /**
     * Edit profile handler.
     *
     * @param int $id   User ID.
     */
    public function handleUpdate($id)
    {
        $oldUser = $this->di->common->verifyUser();
        if ($oldUser->id != $id) {
            $this->di->session->set('Du har inte behörighet att redigera den begärda profilen.');
            $this->di->common->redirect('user/profile');
        }
        
        $form = new Form('user-form', User::class);
        if ($this->di->user->updateFromForm($form, $oldUser)) {
            $this->di->session->set('msg', 'Din profil har uppdaterats.');
            $this->di->common->redirect('user/profile');
        }
        
        $this->renderPage('user/form', [
            'user' => $form->getModel(),
            'admin' => null,
            'update' => true,
            'form' => $form
        ], 'Redigera profil');
    }
    
    
    /**
     * Login page.
     */
    public function login()
    {
        $returnUrl = $this->di->session->getOnce('returnUrl');
        $user = $this->di->user->getCurrent();
        if ($user) {
            $this->di->common->redirect('user/profile');
        }
        
        $this->renderPage('user/login', ['returnUrl' => $returnUrl], 'Logga in');
    }
    
    
    /**
     * Login handler.
     */
    public function handleLogin()
    {
        $username = $this->di->request->getPost('username', '');
        $password = $this->di->request->getPost('password', '');
        if ($username === '' || $password === '' || !$this->di->user->login($username, $password)) {
            $this->di->session->set('err', 'Felaktigt användarnamn eller lösenord.');
        }
        $this->di->common->redirect($this->di->request->getPost('url', 'user/login'));
    }
    
    
    /**
     * Logout handler.
     */
    public function handleLogout()
    {
        if ($this->di->user->getCurrent()) {
            $this->di->user->logout();
            $this->di->session->set('msg', 'Du har loggats ut.');
        }
        $this->di->common->redirect('user/login');
    }
    
    
    /**
     * Convenience method to render page.
     *
     * @param string    $view   View template.
     * @param array     $data   View data.
     * @param string    $title  View title.
     */
    protected function renderPage($view, $data, $title)
    {
        $this->di->view->add($view, $data, 'main');
        $this->di->common->renderPage($title, null, ['flash' => 'img/bg4.jpg']);
    }
}
