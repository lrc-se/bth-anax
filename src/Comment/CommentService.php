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
     * Get a comment by ID.
     *
     * @param int $id   Comment ID.
     *
     * @return Comment|null Comment model instance if found, null otherwise.
     */
    public function getById($id)
    {
        return ($this->di->comments->find('id', $id) ?: null);
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
        $comments = $this->di->comments->getAll('contentId = ?', [$contentId]);
        if (!empty($comments)) {
            // sort comments by post date (descending)
            usort($comments, function ($item1, $item2) {
                return strnatcmp($item2->created, $item1->created);
            });
            
            // filter comments by age
            if ($this->config['maxAge']) {
                $comments = array_filter($comments, function ($comment) {
                    $date = \DateTime::createFromFormat('Y-m-d H:i:s', $comment->created);
                    $diff = (new \DateTime())->diff($date);
                    return ($diff->days <= $this->config['maxAge']);
                });
            }
            
            return ($this->config['desc'] ? $comments : array_reverse($comments));
        }
        
        return [];
    }
    
    
    /**
     * Add a comment.
     *
     * @param Comment   $comment    The comment.
     */
    public function addComment($comment)
    {
        $comment->created = date('Y-m-d H:i:s');
        $comment->updated = null;
        $this->di->comments->save($comment);
    }
    
    
    /**
     * Update a comment.
     *
     * @param Comment   $comment    Comment to modify.
     *
     * @return bool                 True if comment found, false otherwise.
     */
    public function updateComment($comment)
    {
        $oldComment = $this->di->comments->find('id', $comment->id);
        if ($oldComment) {
            $comment->userId = $oldComment->userId;
            $comment->created = $oldComment->created;
            $comment->updated = date('Y-m-d H:i:s');
            $this->di->comments->save($comment);
            return true;
        }
        
        return false;
    }
    
    
    /**
     * Delete a comment.
     *
     * @param Comment   $comment    Comment to delete.
     *
     * @return bool     True if comment found, false otherwise.
     */
    public function deleteComment($comment)
    {
        $comment = $this->di->comments->find('id', $comment->id);
        if ($comment) {
            $this->di->comments->delete($comment);
            return true;
        }
        
        return false;
    }
}
