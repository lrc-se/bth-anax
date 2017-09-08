<?php

namespace LRC\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;

/**
 * Comment system.
 */
class CommentService implements ConfigureInterface
{
    use ConfigureTrait;


    /**
     * @var \Anax\Session $session inject a reference to the session.
     */
    private $session;
    
    /**
     * @var \LRC\User\UserService $user inject a reference to the user service.
     */
    private $user;
    
    /**
     * @var string $key to use when storing in session.
     */
    const KEY = 'comments';


    /**
     * Inject dependencies.
     *
     * @param array $dependency key/value array with dependencies.
     *
     * @return self
     */
    public function inject($dependency)
    {
        $this->session = $dependency['session'];
        $this->user = $dependency['user'];
        return $this;
    }


    /**
     * Get all comments.
     *
     * @return array    All comments.
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getComments($contentId)
    {
        $data = $this->session->get(self::KEY);
        if (isset($data[$contentId])) {
            $comments = $data[$contentId];
            
            // sort comments by post date (descending)
            usort($comments, function ($item1, $item2) {
                return strnatcmp($item2['created'], $item1['created']);
            });
            
            // retrieve user info
            foreach ($comments as &$entry) {
                $entry['user'] = $this->user->getById($entry['userId']);
            }
            
            // filter comments by age
            if ($this->config['maxAge']) {
                $comments = array_filter($comments, function ($comment) {
                    $date = \DateTime::createFromFormat('Y-m-d H:i:s', $comment['created']);
                    $diff = (new \DateTime())->diff($date);
                    return ($diff->days <= $this->config['maxAge']);
                });
            }
            
            return ($this->config['desc'] ? $comments : array_reverse($comments));
        }
        return [];
    }


    /**
     * Save all comments.
     *
     * @param array $comments   Comments to save.
     *
     * @return self
     */
    public function saveComments($contentId, $comments)
    {
        // clean user info
        foreach ($comments as &$entry) {
            unset($entry['user']);
        }
            
        $data = $this->session->get(self::KEY, []);
        $data[$contentId] = $comments;
        $this->session->set(self::KEY, $data);
        return $this;
    }
    
    
    /**
     * Add a comment.
     *
     * @param string $comment   The comment.
     *
     * @return array            The new comment inserted.
     */
    public function addComment($contentId, $comment)
    {
        $comments = $this->getComments($contentId);
        
        // Get next available value for the id
        $ids = array_column($comments, 'id');
        $comment['id'] = (empty($ids) ? 1 : max($ids) + 1);
        
        $comment['created'] = date('Y-m-d H:i:s');
        $comment['updated'] = null;
        $comments[] = $comment;
        $this->saveComments($contentId, $comments);
        return $comment;
    }


    /**
     * Upsert/replace a comment.
     *
     * @param string $id        Comment ID.
     * @param string $comment   Comment to modify.
     *
     * @return array            The upserted comment.
     */
    public function upsert($contentId, $commentId, $comment)
    {
        $comments = $this->getComments($contentId);
        $comment['id'] = $commentId;

        // Replace the comment if it exists
        $found = false;
        foreach ($comments as $idx => $entry) {
            if ($commentId === $entry['id']) {
                $comment['created'] = $comments[$idx]['created'];
                $comment['updated'] = date('Y-m-d H:i:s');
                $comments[$idx] = $comment;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $comment['created'] = date('Y-m-d H:i:s');
            $comment['updated'] = null;
            $comments[] = $comment;
        }
        $this->saveComments($contentId, $comments);
        return $comment;
    }


    /**
     * Delete a comment.
     *
     * @param string $contentId     Content ID.
     * @param string $commentId     Comment ID.
     *
     * @return bool                 True if comment found, false otherwise.
     */
    public function deleteComment($contentId, $commentId)
    {
        $comments = $this->getComments($contentId);

        // Delete the comment if it exists
        foreach ($comments as $idx => $entry) {
            if ($commentId === $entry['id']) {
                unset($comments[$idx]);
                $this->saveComments($contentId, $comments);
                return true;
            }
        }
        
        return false;
    }
}
