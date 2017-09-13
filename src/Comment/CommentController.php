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
     * @param string $contentId     Content ID.
     * @param string $commentId     Comment ID.
     *
     * @return void
     */
    public function get($contentId, $commentId)
    {
        $comment = $this->di->comments->getById($contentId, $commentId);
        if ($comment) {
            $this->di->response->sendJson($comment);
        }
        exit;
    }
    
    
    /**
     * Create a new comment.
     *
     * @param string $contentId     Content ID.
     *
     * @return void
     */
    public function create($contentId)
    {
        $comment = $this->populateComment();
        if (!isset($comment['userId'])) {
            $name = $this->di->request->getPost('name');
            $email = $this->di->request->getPost('email');
            if ($name !== '') {
                $user = $this->di->user->getAnonymous($name, $email);
                if (!$user) {
                    $user = $this->di->user->addUser([
                        'username' => null,
                        'password' => null,
                        'name' => $name,
                        'email' => $email,
                        'anonymous' => 1,
                        'admin' => 0
                    ]);
                }
                $comment['userId'] = $user['id'];
            } else {
                $this->di->session->set('err', 'Namn måste anges.');
                $this->back();
            }
        }
        if ($comment && $comment['text'] !== '') {
            $comment = $this->di->comments->addComment($contentId, $comment);
        } else {
            $this->di->session->set('err', 'Kommentar saknas.');
        }
        $this->back();
    }


    /**
     * Upsert/replace a comment.
     *
     * @param string $contentId     Content ID.
     * @param string $commentId     Comment ID.
     *
     * @return void
     */
    public function update($contentId, $commentId)
    {
        $user = $this->di->user->getCurrent();
        if ($user) {
            $oldComment = $this->di->comments->getById($contentId, $commentId);
            if ($oldComment && ($user['admin'] == 1 || $oldComment['userId'] == $user['id'])) {
                $comment = $this->populateComment();
                if ($comment) {
                    $comment = $this->di->comments->upsertComment($contentId, $commentId, $comment);
                }
            } else {
                $this->di->session->set('err', 'Du har inte behörighet att redigera denna kommentar.');
            }
        } else {
            $this->di->session->set('err', 'Du har inte behörighet att redigera denna kommentar.');
        }
        $this->back();
    }


    /**
     * Delete a comment.
     *
     * @param string $contentId     Content ID.
     * @param string $commentId     Comment ID.
     *
     * @return void
     */
    public function delete($contentId, $commentId)
    {
        $user = $this->di->user->getCurrent();
        if ($user) {
            $oldComment = $this->di->comments->getById($contentId, $commentId);
            if ($oldComment && ($user['admin'] == 1 || $oldComment['userId'] == $user['id'])) {
                $this->di->comments->deleteComment($contentId, $commentId);
            } else {
                $this->di->session->set('err', 'Du har inte behörighet att ta bort denna kommentar.');
            }
        } else {
            $this->di->session->set('err', 'Du har inte behörighet att ta bort denna kommentar.');
        }
        $this->back();
    }


    /**
     * Populate comment from request form data.
     *
     * @return array
     */
    private function populateComment()
    {
        return [
            'userId' => $this->di->request->getPost('userId'),
            'text' => $this->di->request->getPost('text', '')
        ];
    }
    
    /**
     * Return to calling page.
     */
    private function back()
    {
        $this->di->common->redirect($this->di->request->getPost('url', $this->di->request->getServer('HTTP_REFERER')) . '#comments');
    }
}
