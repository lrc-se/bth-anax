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
        $user = $this->di->common->verifyUser();        
        $this->renderPage('user/index', ['user' => $user], 'Välkommen, ' . $user->username . '!');
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
            $this->di->session->set('userId', $user->id);
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
     * Admin page.
     */
    public function admin()
    {
        $admin = $this->di->common->verifyAdmin();
        $this->renderPage('user/admin', [], 'Administration');
    }
    
    
    /**
     * Admin user list.
     */
    public function users()
    {
        $admin = $this->di->common->verifyAdmin();
        $users = $this->di->repository->users->getAll();
        $this->renderPage('user/list', ['users' => $users, 'admin' => $admin], 'Administrera användare');
    }
    
    
    /**
     * Admin edit profile page.
     */
    public function adminUpdate($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->di->user->getById($id);
        if (!$user) {
            $this->di->session->set('err', "Kunde inte hitta användaren med ID $id.");
            $this->di->common->redirect('user/admin/user');
        }
        
        $this->renderPage('user/form', [
            'user' => $user,
            'admin' => $admin,
            'update' => true,
            'form' => new Form('user-form', $user)
        ], 'Redigera användare');
    }
    
    
    /**
     * Admin edit profile handler.
     */
    public function handleAdminUpdate($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $oldUser = $this->di->user->getById($id);
        if (!$oldUser) {
            $this->di->session->set('err', "Kunde inte hitta användaren med ID $id.");
            $this->di->common->redirect('user/admin/user');
        }
        
        $form = new Form('user-form', User::class);
        if ($this->di->user->updateFromForm($form, $oldUser, true)) {
            $this->di->session->set('msg', "Användaren '" . htmlspecialchars($form->getModel()->username) . "' har uppdaterats.");
            $this->di->common->redirect('user/admin/user');
        }
        
        $this->renderPage('user/form', [
            'user' => $form->getModel(),
            'admin' => $admin,
            'update' => true,
            'form' => $form
        ], 'Redigera användare');
    }
    
    
    /**
     * Admin create user page.
     */
    public function adminCreate()
    {
        $admin = $this->di->common->verifyAdmin();
        $this->renderPage('user/form', [
            'user' => null,
            'admin' => $admin,
            'update' => false,
            'form' => new Form('user-form', User::class)
        ], 'Skapa användare');
    }
    
    
    /**
     * Admin create user handler.
     */
    public function handleAdminCreate()
    {
        $admin = $this->di->common->verifyAdmin();
        $form = new Form('user-form', User::class);
        if ($this->di->user->createFromForm($form, true)) {
            $this->di->session->set('msg', "Användaren '" . htmlspecialchars($form->getModel()->username) . "' har skapats.");
            $this->di->common->redirect('user/admin/user');
        }
        
        $this->renderPage('user/form', [
            'user' => $form->getModel(),
            'admin' => $admin,
            'update' => false,
            'form' => $form
        ], 'Skapa användare');
    }
    
    
    /**
     * Admin delete user page.
     */
    public function adminDelete($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->di->user->getById($id);
        if (!$user) {
            $this->di->session->set('err', "Kunde inte hitta användaren med ID $id.");
            $this->di->common->redirect('user/admin/user');
        } elseif ($user->id == $admin->id) {
            $this->di->session->set('err', "Du kan inte ta bort din egen användare.");
            $this->di->common->redirect('user/admin/user');
        }
        
        $this->renderPage('user/delete', ['user' => $user], 'Ta bort användare');
    }
    
    
    /**
     * Admin delete user handler.
     */
    public function handleAdminDelete($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->di->user->getById($id);
        if (!$user) {
            $this->di->session->set('err', "Kunde inte hitta användaren med ID $id.");
            $this->di->common->redirect('user/admin/user');
        } elseif ($user->id == $admin->id) {
            $this->di->session->set('err', "Du kan inte ta bort din egen användare.");
            $this->di->common->redirect('user/admin/user');
        }
        
        if ($this->di->request->getPost('action') == 'delete') {
            $this->di->user->delete($user);
            $this->di->session->set('msg', "Användaren '" . htmlspecialchars($user->username) . "' har tagits bort.");
        }
        $this->di->common->redirect('user/admin/user');
    }
    
    
    /**
     * Admin restore user handler.
     */
    public function handleAdminRestore($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->di->user->getById($id);
        if (!$user) {
            $this->di->session->set('err', "Kunde inte hitta användaren med ID $id.");
            $this->di->common->redirect('user/admin/user');
        }
        
        $this->di->user->restore($user);
        $this->di->session->set('msg', "Användaren '" . htmlspecialchars($user->username) . "' har återställts.");
        $this->di->common->redirect('user/admin/user');
    }
    
    
    /**
     * Admin register anonymous user page.
     */
    public function adminRegister($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->di->user->getById($id);
        if (!$user || !is_null($user->username)) {
            $this->di->session->set('err', "Kunde inte hitta en anonym användare med ID $id.");
            $this->di->common->redirect('user/admin/user');
        }
        
        $this->renderPage('user/register', [
            'user' => $user,
            'form' => new Form('user-form', $user)
        ], 'Registrera användare');
    }
    
    
    /**
     * Admin register anonymous user handler.
     */
    public function handleAdminRegister($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $oldUser = $this->di->user->getById($id);
        if (!$oldUser || !is_null($oldUser->username)) {
            $this->di->session->set('err', "Kunde inte hitta en anonym användare med ID $id.");
            $this->di->common->redirect('user/admin/user');
        }
        
        $form = new Form('user-form', User::class);
        if ($this->di->user->registerAnonymousFromForm($form, $oldUser, true)) {
            $this->di->session->set('msg', "Användaren '" . htmlspecialchars($form->getModel()->username) . "' har registrerats.");
            $this->di->common->redirect('user/admin/user');
        }
        
        $this->renderPage('user/register', [
            'user' => $form->getModel(),
            'form' => $form
        ], 'Registrera användare');
    }
    
    
    /**
     * Convenience method to render page.
     */
    private function renderPage($view, $data, $title)
    {
        $this->di->view->add($view, $data, 'main');
        $this->di->common->renderPage($title, null, ['flash' => $this->flash]);
    }
    
    
    /**
     * Admin comment list.
     */
    public function comments()
    {
        $admin = $this->di->common->verifyAdmin();
        $comments = $this->di->repository->comments->getAll();
        $this->renderPage('comment/list', ['comments' => $comments], 'Administrera kommentarer');
    }
}
