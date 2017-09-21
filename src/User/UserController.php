<?php

namespace LRC\User;

use \LRC\Form\ModelForm as Form;

/**
 * Controller for users.
 */
class UserController extends \LRC\Common\BaseController
{
    /**
     * @var string  Section-wide flash image.
     */
    private $flash = 'img/bg4.jpg';
    
    
    /**
     * Profile page.
     */
    public function profile()
    {
        $user = $this->di->user->getCurrent();
        if (!$user) {
            $this->di->common->redirect('user/login');
        }
        
        $this->di->view->add('user/index', ['user' => $user], 'main');
        $this->di->common->renderPage('Välkommen, ' . $user->username . '!', null, ['flash' => $this->flash]);
    }
    
    
    /**
     * Registration page.
     */
    public function create()
    {
        $this->di->view->add('user/form', [
            'user' => null,
            'admin' => null,
            'update' => false,
            'form' => new Form('user-form', '\\LRC\\User\\User')
        ], 'main');
        $this->di->common->renderPage('Registrera användare', null, ['flash' => $this->flash]);
    }
    
    
    /**
     * Registration handler.
     */
    public function handleCreate()
    {
        $form = new Form('user-form', '\\LRC\\User\\User');
        $user = $form->populateModel([$this->di->request, 'getPost']);
        $form->validate();
        if ($user->password !== $this->di->request->getPost('password2')) {
            $form->addError('password', 'Lösenorden stämmer inte överens.');
            $form->addError('password2', 'Lösenorden stämmer inte överens.');
        }
        if ($form->isValid()) {
            $user->admin = 0;
            $user->hashPassword();
            $this->di->repository->users->save($user);
            $this->di->session->set('userId', $user->id);
            $this->di->session->set('msg', 'Ditt användarkonto har skapats.');
            $this->di->common->redirect('user/profile');
        }
        
        $this->di->view->add('user/form', [
            'user' => $form->getModel(),
            'admin' => null,
            'update' => false,
            'form' => $form
        ], 'main');
        $this->di->common->renderPage('Registrera användare', null, ['flash' => $this->flash]);
    }
    
    
    /**
     * Edit profile page.
     */
    public function update($id)
    {
        $user = $this->di->user->getCurrent();
        if (!$user || $user->id != $id) {
            $this->di->common->redirect('user/profile');
        }
        
        $this->di->view->add('user/form', [
            'user' => $user,
            'admin' => null,
            'update' => true,
            'form' => new Form('user-form', $user)
        ], 'main');
        $this->di->common->renderPage('Redigera profil', null, ['flash' => $this->flash]);
    }
    
    
    /**
     * Registration handler.
     */
    public function handleUpdate($id)
    {
        $curUser = $this->di->user->getCurrent();
        if (!$curUser || $curUser->id != $id) {
            $this->di->common->redirect('user/profile');
        }
        
        $form = new Form('user-form', '\\LRC\\User\\User');
        $user = $form->populateModel([$this->di->request, 'getPost']);
        $user->id = $id;
        $user->username = $curUser->username;
        if (is_null($user->password)) {
            $user->password = $curUser->password;
            $form->validate();
        } else {
            $form->validate();
            if ($user->password === $this->di->request->getPost('password2')) {
                $user->hashPassword();
            } else {
                $form->addError('password', 'Lösenorden stämmer inte överens.');
                $form->addError('password2', 'Lösenorden stämmer inte överens.');
            }
        }
        if ($form->isValid()) {
            $user->admin = 0;
            $this->di->repository->users->save($user);
            $this->di->session->set('msg', 'Din profil har uppdaterats.');
            $this->di->common->redirect('user/profile');
        }
        
        $this->di->view->add('user/form', [
            'user' => $user,
            'admin' => null,
            'update' => true,
            'form' => $form
        ], 'main');
        $this->di->common->renderPage('Redigera profil', null, ['flash' => $this->flash]);
    }
    
    
    /**
     * Login page.
     */
    public function login()
    {
        $user = $this->di->user->getCurrent();
        if ($user) {
            $this->di->common->redirect('user/profile');
        }
        
        $this->di->view->add('user/login', [], 'main');
        $this->di->common->renderPage('Logga in', null, ['flash' => $this->flash]);
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
        $this->di->common->redirect('user/login');
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
}
