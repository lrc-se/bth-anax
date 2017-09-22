<?php

namespace LRC\User;

use \LRC\Form\ModelForm as Form;

/**
 * Controller for admin.
 */
class AdminController extends UserController
{
    /**
     * Admin page.
     */
    public function index()
    {
        $admin = $this->di->common->verifyAdmin();
        $this->renderPage('admin/index', [], 'Administration');
    }
    
    
    /**
     * Admin user list.
     */
    public function users()
    {
        $admin = $this->di->common->verifyAdmin();
        $users = $this->di->repository->users->getAll();
        $this->renderPage('admin/user-list', ['users' => $users, 'admin' => $admin], 'Administrera användare');
    }
    
    
    /**
     * Admin edit user page.
     */
    public function updateUser($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->checkUser($id);
        
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
    public function handleUpdateUser($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $oldUser = $this->checkUser($id);
        
        $form = new Form('user-form', User::class);
        if ($this->di->user->updateFromForm($form, $oldUser, true)) {
            $this->di->session->set('msg', "Användaren '" . htmlspecialchars($form->getModel()->username) . "' har uppdaterats.");
            $this->di->common->redirect('admin/user');
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
    public function createUser()
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
    public function handleCreateUser()
    {
        $admin = $this->di->common->verifyAdmin();
        $form = new Form('user-form', User::class);
        if ($this->di->user->createFromForm($form, true)) {
            $this->di->session->set('msg', "Användaren '" . htmlspecialchars($form->getModel()->username) . "' har skapats.");
            $this->di->common->redirect('admin/user');
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
    public function deleteUser($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->checkUser($id);
        if ($user->id == $admin->id) {
            $this->di->session->set('err', "Du kan inte ta bort din egen användare.");
            $this->di->common->redirect('admin/user');
        }
        
        $this->renderPage('admin/user-delete', ['user' => $user], 'Ta bort användare');
    }
    
    
    /**
     * Admin delete user handler.
     */
    public function handleDeleteUser($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->checkUser($id);
        if ($user->id == $admin->id) {
            $this->di->session->set('err', "Du kan inte ta bort din egen användare.");
            $this->di->common->redirect('admin/user');
        }
        
        if ($this->di->request->getPost('action') == 'delete') {
            $this->di->user->delete($user);
            $this->di->session->set('msg', "Användaren '" . htmlspecialchars($user->username) . "' har tagits bort.");
        }
        $this->di->common->redirect('admin/user');
    }
    
    
    /**
     * Admin restore user handler.
     */
    public function handleRestoreUser($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->checkUser($id, false);
        
        $this->di->user->restore($user);
        $this->di->session->set('msg', "Användaren '" . htmlspecialchars($user->username) . "' har återställts.");
        $this->di->common->redirect('admin/user');
    }
    
    
    /**
     * Admin register anonymous user page.
     */
    public function registerUser($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->checkUser($id, true, true);
        
        $this->renderPage('admin/user-register', [
            'user' => $user,
            'form' => new Form('user-form', $user)
        ], 'Registrera användare');
    }
    
    
    /**
     * Admin register anonymous user handler.
     */
    public function handleRegisterUser($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $oldUser = $this->checkUser($id, true, true);
        
        $form = new Form('user-form', User::class);
        if ($this->di->user->registerAnonymousFromForm($form, $oldUser, true)) {
            $this->di->session->set('msg', "Användaren '" . htmlspecialchars($form->getModel()->username) . "' har registrerats.");
            $this->di->common->redirect('admin/user');
        }
        
        $this->renderPage('admin/user-register', [
            'user' => $form->getModel(),
            'form' => $form
        ], 'Registrera användare');
    }
    
    
    /**
     * Admin comment list.
     */
    public function comments()
    {
        $admin = $this->di->common->verifyAdmin();
        $comments = $this->di->repository->comments->getAll();
        $this->renderPage('admin/comment-list', ['comments' => $comments], 'Administrera kommentarer');
    }
    
    
    /**
     * Retrieve requested user and check that it has the desired state, redirecting to index if not (or if no user found).
     *
     * @param int  $id          User ID.
     * @param bool $active      Whether the user should be active.
     * @param bool $anonymous   Whether the user should be anonymous.
     *
     * @return User             User model instance.
     */
    private function checkUser($id, $active = true, $anonymous = false)
    {
        $user = $this->di->user->getById($id);
        if (!$user) {
            $fail = true;
        } elseif (!is_null($user->deleted)) {
            $fail = $active;
        } elseif (!is_null($user->username)) {
            $fail = $anonymous;
        }
        if ($fail) {
            $activeStr = ($active ? 'aktiv' : 'inaktiv');
            $anonStr = ($anonymous ? ' anonym' : '');
            $this->di->session->set('err', "Kunde inte hitta en {$activeStr}{$anonStr} användare med ID $id.");
            $this->di->common->redirect('admin/user');
        }
        
        return $user;
    }
}
