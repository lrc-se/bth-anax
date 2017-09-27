<?php

namespace LRC\User;

use \LRC\Form\ModelForm as Form;

/**
 * Controller for admin.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class AdminController extends UserController
{
    /**
     * Admin page.
     */
    public function index()
    {
        $this->di->common->verifyAdmin();
        $this->renderPage('admin/index', [], 'Administration');
    }
    
    
    /**
     * Admin user list.
     */
    public function users()
    {
        $admin = $this->di->common->verifyAdmin();
        
        // apply filters
        $filter = $this->di->request->getGet('filter');
        $status = $this->di->request->getGet('status');
        $where = [];
        switch ($filter) {
            case 'registered':
                $where[] = 'username IS NOT NULL';
                break;
            case 'anonymous':
                $where[] = 'username IS NULL';
                break;
        }
        switch ($status) {
            case 'active':
                $where[] = 'deleted IS NULL';
                break;
            case 'inactive':
                $where[] = 'deleted IS NOT NULL';
                break;
        }
        if (empty($where)) {
            $users = $this->di->repository->users->getAll();
            $total = count($users);
        } else {
            $users = $this->di->repository->users->getAll(implode(' AND ', $where));
            $total = $this->di->repository->users->count();
        }
        
        $this->renderPage('admin/user-list', [
            'users' => $users,
            'admin' => $admin,
            'total' => $total,
            'filter' => $filter,
            'status' => $status
        ], 'Administrera användare');
    }
    
    
    /**
     * Admin edit user page.
     *
     * @param int $id   User ID.
     */
    public function updateUser($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->getUser($id);
        
        $this->renderPage('user/form', [
            'user' => $user,
            'admin' => $admin,
            'update' => true,
            'form' => new Form('user-form', $user)
        ], 'Redigera användare');
    }
    
    
    /**
     * Admin edit profile handler.
     *
     * @param int $id   User ID.
     */
    public function handleUpdateUser($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $oldUser = $this->getUser($id);
        
        $form = new Form('user-form', User::class);
        if ($this->di->user->updateFromForm($form, $oldUser, true)) {
            $this->di->session->set('msg', 'Användaren "' . htmlspecialchars($form->getModel()->username) . '" har uppdaterats.');
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
            $this->di->session->set('msg', 'Användaren "' . htmlspecialchars($form->getModel()->username) . '" har skapats.');
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
     *
     * @param int $id   User ID.
     */
    public function deleteUser($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->getUser($id, true);
        if ($user->id == $admin->id) {
            $this->di->session->set('err', 'Du kan inte ta bort din egen användare.');
            $this->di->common->redirect('admin/user');
        }
        
        $this->renderPage('admin/user-delete', ['user' => $user], 'Ta bort användare');
    }
    
    
    /**
     * Admin delete user handler.
     *
     * @param int $id   User ID.
     */
    public function handleDeleteUser($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $user = $this->getUser($id, true);
        if ($user->id == $admin->id) {
            $this->di->session->set('err', 'Du kan inte ta bort din egen användare.');
            $this->di->common->redirect('admin/user');
        }
        
        if ($this->di->request->getPost('action') == 'delete') {
            $this->di->user->delete($user);
            $this->di->session->set('msg', 'Användaren "' . htmlspecialchars($user->username) . '" har tagits bort.');
        }
        $this->di->common->redirect('admin/user');
    }
    
    
    /**
     * Admin restore user handler.
     *
     * @param int $id   User ID.
     */
    public function handleRestoreUser($id)
    {
        $this->di->common->verifyAdmin();
        $user = $this->getUser($id, false);
        
        if ($this->di->request->getPost('action') == 'restore') {
            $this->di->user->restore($user);
            $this->di->session->set('msg', 'Användaren "' . htmlspecialchars($user->username) . '" har återställts.');
        }
        $this->di->common->redirect('admin/user');
    }
    
    
    /**
     * Admin register anonymous user page.
     *
     * @param int $id   User ID.
     */
    public function registerUser($id)
    {
        $this->di->common->verifyAdmin();
        $user = $this->getUser($id, true, true);
        
        $this->renderPage('admin/user-register', [
            'user' => $user,
            'form' => new Form('user-form', $user)
        ], 'Registrera användare');
    }
    
    
    /**
     * Admin register anonymous user handler.
     *
     * @param int $id   User ID.
     */
    public function handleRegisterUser($id)
    {
        $this->di->common->verifyAdmin();
        $oldUser = $this->getUser($id, true, true);
        
        $form = new Form('user-form', User::class);
        if ($this->di->user->registerAnonymousFromForm($form, $oldUser, true)) {
            $this->di->session->set('msg', 'Användaren "' . htmlspecialchars($form->getModel()->username) . '" har registrerats.');
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
        $this->di->common->verifyAdmin();
        $comments = $this->di->repository->comments->getAll();
        $this->renderPage('admin/comment-list', ['comments' => $comments], 'Administrera kommentarer');
    }
    
    
    /**
     * Admin view comment page.
     *
     * @param int $id   Comment ID.
     */
    public function viewComment($id)
    {
        $this->di->common->verifyAdmin();
        $comment = $this->getComment($id);
        $this->renderPage('admin/comment-view', [
            'comment' => $comment,
            'author' => $comment->getReference('userId', $this->di->repository->users, false)
        ], 'Visa kommentar');
    }
    
    
    /**
     * Admin edit comment page.
     *
     * @param int $id   Comment ID.
     */
    public function updateComment($id)
    {
        $this->di->common->verifyAdmin();
        $comment = $this->getComment($id);
        $form = new Form('comment-form', $comment);
        $this->renderPage('admin/comment-form', [
            'comment' => $comment,
            'author' => $comment->getReference('userId', $this->di->repository->users, false),
            'form' => $form
        ], 'Redigera kommentar');
    }
    
    
    /**
     * Admin edit comment handler.
     *
     * @param int $id   Comment ID.
     */
    public function handleUpdateComment($id)
    {
        $admin = $this->di->common->verifyAdmin();
        $form = new Form('comment-form', '\\LRC\\Comment\\Comment');
        $comment = $form->populateModel();
        $form->validate();
        if ($form->isValid()) {
            $comment->id = $id;
            $comment->editorId = $admin->id;
            if ($this->di->comments->updateComment($comment)) {
                $this->di->session->set('msg', 'Kommentaren har uppdaterats.');
            } else {
                $this->di->session->set('err', "Kunde inte hitta kommentaren med ID $id.");
            }            
            $this->di->common->redirect('admin/comment');
        }
        
        $this->renderPage('admin/comment-form', [
            'comment' => $comment,
            'author' => $comment->getReference('userId', $this->di->repository->users, false),
            'form' => $form
        ], 'Redigera kommentar');
    }
    
    
    /**
     * Admin delete comment page.
     *
     * @param int $id   Comment ID.
     */
    public function deleteComment($id)
    {
        $this->di->common->verifyAdmin();
        $comment = $this->getComment($id);
        $this->renderPage('admin/comment-delete', [
            'comment' => $comment,
            'author' => $comment->getReference('userId', $this->di->repository->users, false)
        ], 'Ta bort kommentar');
    }
    
    
    /**
     * Admin delete comment handler.
     *
     * @param int $id   Comment ID.
     */
    public function handleDeleteComment($id)
    {
        $this->di->common->verifyAdmin();
        $comment = $this->getComment($id);
        if ($this->di->request->getPost('action') == 'delete') {
            $this->di->comments->deleteComment($comment->id);
            $this->di->session->set('msg', 'Kommentaren har tagits bort.');
        }
        $this->di->common->redirect('admin/comment');
    }
    
    
    
    /**
     * Retrieve requested user and check that it has the desired state, redirecting to index if not (or if no user found).
     *
     * @param int  $id          User ID.
     * @param bool $active      Whether the user should be active.
     * @param bool $anonymous   Whether the user should be anonymous (pass null to skip check).
     *
     * @return User             User model instance.
     */
    private function getUser($id, $active = true, $anonymous = false)
    {
        $user = $this->di->user->getById($id);
        $fail = false;
        $activeStr = ($active ? 'aktiv' : 'inaktiv');
        $anonStr = (is_null($anonymous) ? '' : ($anonymous === true ? ' anonym' : ' registrerad'));
        if (!$user) {
            $fail = true;
        } else {
            if (!is_null($anonymous)) {
                $anonCond = !($anonymous xor !is_null($user->username));
            } else {
                $anonCond = false;
            }
            $fail = (!($active xor !is_null($user->deleted)) || $anonCond);
        }
        
        if ($fail) {
            $this->di->session->set('err', "Kunde inte hitta en {$activeStr}{$anonStr} användare med ID $id.");
            $this->di->common->redirect('admin/user');
        }
        return $user;
    }
    
    
    /**
     * Retrieve requested comment, redirecting to index if not found.
     *
     * @param int                   $id     Comment ID.
     *
     * @return \LRC\Comment\Comment         Comment model instance.
     */
    private function getComment($id)
    {
        $comment = $this->di->comments->getById($id);
        if (!$comment) {
            $this->di->session->set('err', "Kunde inte hitta kommentaren med ID $id.");
            $this->di->common->redirect('admin/comment');
        }
        return $comment;
    }
}
