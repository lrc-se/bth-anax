<?php

namespace LRC\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;

/**
 * Comment system.
 */
class CommentService extends \LRC\Common\BaseService implements ConfigureInterface
{
    use ConfigureTrait;


    /**
     * @var string $key to use when storing in session.
     */
    const KEY = 'comments';


    /**
     * Get a comment by ID.
     *
     * @param string $contentId     Content ID.
     * @param string $commentId     Comment ID.
     *
     * @return array|null           Array with the comment if found, null otherwise.
     */
    public function getById($contentId, $commentId)
    {
        $data = $this->di->session->get(self::KEY);
        if (isset($data[$contentId])) {
            foreach ($data[$contentId] as $comment) {
                if ($comment['id'] == $commentId) {
                    return $comment;
                }
            }
        }
        return null;
    }
    
    
    /**
     * Get all comments for specific content.
     *
     * @param string $contentId     Content ID.
     * 
     * @return array                All matching comments.
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getComments($contentId)
    {
        $data = $this->di->session->get(self::KEY);
        if (isset($data[$contentId])) {
            $comments = $data[$contentId];
            
            // sort comments by post date (descending)
            usort($comments, function ($item1, $item2) {
                return strnatcmp($item2['created'], $item1['created']);
            });
            
            // retrieve user info
            foreach ($comments as &$entry) {
                $entry['user'] = $this->di->user->getById($entry['userId']);
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
     * Save all comments for specific content.
     *
     * @param string $contentId     Content ID.
     * @param array  $comments      Comments to save.
     *
     * @return self
     */
    public function saveComments($contentId, $comments)
    {
        // clean user info
        foreach ($comments as &$entry) {
            unset($entry['user']);
        }
            
        $data = $this->di->session->get(self::KEY, []);
        $data[$contentId] = $comments;
        $this->di->session->set(self::KEY, $data);
        return $this;
    }
    
    
    /**
     * Add a comment.
     *
     * @param string $contentId     Content ID.
     * @param array  $comment       The comment.
     *
     * @return array                The new comment inserted.
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
     * @param string $contentId     Content ID.
     * @param string $commentId     Comment ID.
     * @param array  $comment       Comment to modify.
     *
     * @return array                The upserted comment.
     */
    public function upsertComment($contentId, $commentId, $comment)
    {
        $comments = $this->getComments($contentId);
        $comment['id'] = $commentId;

        // replace the comment if it exists
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

        // create new comment if it didn't exist
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

        // delete the comment if it exists
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
