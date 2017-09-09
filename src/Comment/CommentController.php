<?php

namespace LRC\Comment;

/**
 * Controller for the comment system.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class CommentController extends \LRC\App\BaseController
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
        $comment = $this->app->comments->getById($contentId, $commentId);
        if ($comment) {
            $this->app->response->sendJson($comment);
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
            $name = $this->app->request->getPost('name');
            $email = $this->app->request->getPost('email');
            if ($name !== '') {
                $user = $this->app->user->getAnonymous($name, $email);
                if (!$user) {
                    $user = $this->app->user->addUser([
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
                $this->app->session->set('err', 'Namn måste anges.');
                $this->back();
            }
        }
        if ($comment && $comment['text'] !== '') {
            $comment = $this->app->comments->addComment($contentId, $comment);
        } else {
            $this->app->session->set('err', 'Kommentar saknas.');
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
        $user = $this->app->user->getCurrent();
        if ($user) {
            $oldComment = $this->app->comments->getById($contentId, $commentId);
            if ($oldComment && ($user['admin'] == 1 || $oldComment['userId'] == $user['id'])) {
                $comment = $this->populateComment();
                if ($comment) {
                    $comment = $this->app->comments->upsertComment($contentId, $commentId, $comment);
                }
            } else {
                $this->app->session->set('err', 'Du har inte behörighet att redigera denna kommentar.');
            }
        } else {
            $this->app->session->set('err', 'Du har inte behörighet att redigera denna kommentar.');
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
        $user = $this->app->user->getCurrent();
        if ($user) {
            $oldComment = $this->app->comments->getById($contentId, $commentId);
            if ($oldComment && ($user['admin'] == 1 || $oldComment['userId'] == $user['id'])) {
                $this->app->comments->deleteComment($contentId, $commentId);
            } else {
                $this->app->session->set('err', 'Du har inte behörighet att ta bort denna kommentar.');
            }
        } else {
            $this->app->session->set('err', 'Du har inte behörighet att ta bort denna kommentar.');
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
            //'id' => $this->app->request->getPost('id'),
            'userId' => $this->app->request->getPost('userId'),
            'text' => $this->app->request->getPost('text', '')
        ];
    }
    
    /**
     * Return to calling page.
     */
    private function back()
    {
        $this->app->redirect($this->app->request->getPost('url', $this->app->request->getServer('HTTP_REFERER')) . '#comments');
    }
}
