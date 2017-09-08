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
        }
        if ($comment) {
            $comment = $this->app->comments->addComment($contentId, $comment);
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
        $comment = $this->populateComment();
        if ($comment) {
            $comment = $this->app->comments->upsertComment($contentId, $commentId, $comment);
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
        $this->app->comments->deleteComment($contentId, $commentId);
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
            'id' => $this->app->request->getPost('id'),
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
