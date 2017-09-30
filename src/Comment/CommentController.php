<?php

namespace LRC\Comment;

use \LRC\Common\BaseController;
use \LRC\Form\ModelForm as Form;

/**
 * Controller for the comment system.
 */
class CommentController extends BaseController
{
    /**
     * Retrieve a comment.
     *
     * @param int $id   Comment ID.
     *
     * @return true
     */
    public function get($id)
    {
        $comment = $this->di->comments->getById($id);
        if ($comment) {
            $this->di->response->sendJson($comment);
        } else {
            $this->di->response->send(404);
        }
        return true;
    }
    
    
    /**
     * Create a new comment.
     *
     * @return void
     */
    public function create()
    {
        $user = $this->di->user->getCurrent();
        if (!$user && !$this->di->comments->getConfig('allowAnonymous')) {
            $this->di->session->set('err', 'Du måste vara inloggad för att skriva en kommentar.');
            $this->back();
        }
        
        $form = new Form('comment-form', CommentVM::class);
        $commentVM = $form->populateModel();
        if ($user) {
            $commentVM->name = $user->name;
            $commentVM->email = $user->email;
        }
        
        $form->validate();
        if ($form->isValid()) {
            if (!$user) {
                $user = $this->di->user->getAnonymous($commentVM->name, $commentVM->email, true);
            }
            $comment = new Comment();
            $comment->contentId = $commentVM->contentId;
            $comment->userId = $user->id;
            $comment->text = $commentVM->text;
            $this->di->comments->addComment($comment);
            $this->back();
        }
        
        $this->di->session->set('commentForm', $form);
        $this->back(true);
    }


    /**
     * Upsert/replace a comment.
     *
     * @param int $id   Comment ID.
     *
     * @return void
     */
    public function update($id)
    {
        $oldComment = $this->di->comments->getById($id);
        if (!$oldComment) {
            $this->di->session->set('err', 'Kunde inte hitta kommentaren.');
            $this->back();
        }
        
        $user = $this->di->user->getCurrent();
        if (!$user || (!$user->admin && $oldComment->userId !== $user->id)) {
            $this->di->session->set('err', 'Du har inte behörighet att redigera denna kommentar.');
            $this->back();
        }
                
        $comment = new Comment();
        $comment->contentId = $this->di->request->getPost('contentId');
        $comment->text = $this->di->request->getPost('text');
        if ($comment->isValid()) {
            $comment->id = $id;
            $comment->editorId = $user->id;
            $this->di->comments->updateComment($comment);
        } else {
            $errors = '';
            foreach ($comment->getValidationErrors() as $error) {
                $errors .= "<li>$error</li>";
            }
            $this->di->session->set('err', "<p>Följande fel uppstod:</p><ul>$errors</ul>");
        }
        $this->back();
    }


    /**
     * Delete a comment.
     *
     * @param int $id   Comment ID.
     *
     * @return void
     */
    public function delete($id)
    {
        $oldComment = $this->di->comments->getById($id);
        if (!$oldComment) {
            $this->di->session->set('err', 'Kunde inte hitta kommentaren.');
            $this->back();
        }
        
        $user = $this->di->user->getCurrent();
        if (!$user || (!$user->admin && $oldComment->userId !== $user->id)) {
            $this->di->session->set('err', 'Du har inte behörighet att ta bort denna kommentar.');
            $this->back();
        }
        
        $this->di->comments->deleteComment($id);
        $this->back();
    }


    /**
     * Return to calling page.
     *
     * @param bool $toForm  Whether to scroll to form or not.
     */
    private function back($toForm = false)
    {
        $this->di->common->redirect($this->di->request->getPost('url', $this->di->request->getServer('HTTP_REFERER')) . ($toForm ? '#comment-add' : '#comments'));
    }
}
