<?php

namespace LRC\Comment;

/**
 * Controller for the comment system.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class CommentController extends \LRC\Common\BaseController
{
    /**
     * Retrieve a comment.
     *
     * @param int $id   Comment ID.
     *
     * @return void
     */
    public function get($id)
    {
        $comment = $this->di->comments->getById($id);
        if ($comment) {
            $this->di->response->sendJson($comment);
        } else {
            $this->di->response->send(404);
        }
        exit;
    }
    
    
    /**
     * Create a new comment.
     *
     * @return void
     */
    public function create()
    {
        $comment = $this->populateComment();
        $user = $this->di->user->getCurrent();
        if (!$user) {
            $name = $this->di->request->getPost('name');
            $email = $this->di->request->getPost('email');
            if ($name !== '') {
                $user = $this->di->user->getAnonymous($name, $email);
                if (!$user) {
                    $user = $this->di->user->addAnonymous($name, $email);
                }
            } else {
                $this->di->session->set('err', 'Namn måste anges.');
                $this->back();
            }
        }
        if ($comment->isValid()) {
            $comment->userId = $user->id;
            $this->di->comments->addComment($comment);
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
     * Upsert/replace a comment.
     *
     * @param int $id   Comment ID.
     *
     * @return void
     */
    public function update($id)
    {
        $user = $this->di->user->getCurrent();
        if (!$user) {
            $this->di->session->set('err', 'Du har inte behörighet att redigera denna kommentar.');
            $this->back();
        }
        
        $oldComment = $this->di->comments->getById($id);
        if (!$oldComment) {
            $this->di->session->set('err', 'Kunde inte hitta kommentaren.');
            $this->back();
        }
        
        if ($user->admin || $oldComment->userId === $user->id) {
            $comment = $this->populateComment();
            if ($comment->isValid()) {
                $comment->id = $id;
                $comment->editorId = $user->id;
                if (!$this->di->comments->updateComment($comment)) {
                    $this->di->session->set('err', 'Kunde inte hitta kommentaren.');
                }
            } else {
                $errors = '';
                foreach ($comment->getValidationErrors() as $error) {
                    $errors .= "<li>$error</li>";
                }
                $this->di->session->set('err', "<p>Följande fel uppstod:</p><ul>$errors</ul>");
            }
        } else {
            $this->di->session->set('err', 'Du har inte behörighet att redigera denna kommentar.');
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
        $user = $this->di->user->getCurrent();
        if ($user) {
            $oldComment = $this->di->comments->getById($id);
            if ($oldComment) {
                if ($user->admin || $oldComment->userId === $user->id) {
                    if (!$this->di->comments->deleteComment($oldComment)) {
                        $this->di->session->set('err', 'Kunde inte hitta kommentaren.');
                    }
                } else {
                    $this->di->session->set('err', 'Du har inte behörighet att ta bort denna kommentar.');
                }
            } else {
                $this->di->session->set('err', 'Kunde inte hitta kommentaren.');
            }
        } else {
            $this->di->session->set('err', 'Du har inte behörighet att ta bort denna kommentar.');
        }
        $this->back();
    }


    /**
     * Populate comment from request form data.
     *
     * @return Comment
     */
    private function populateComment()
    {
        $comment = new Comment();
        $comment->contentId = $this->di->request->getPost('contentId');
        $comment->text = $this->di->request->getPost('text');
        return $comment;
    }
    
    
    /**
     * Return to calling page.
     */
    private function back()
    {
        $this->di->common->redirect($this->di->request->getPost('url', $this->di->request->getServer('HTTP_REFERER')) . '#comments');
    }
}
