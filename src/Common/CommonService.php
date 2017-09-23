<?php

namespace LRC\Common;

/**
 * Common framework resources.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class CommonService extends BaseService
{
    /**
     * @var array   Flash messages.
     */
    private $messages;
    
    
    /**
     * Redirect to URL.
     *
     * @param string $url   URL to redirect to.
     */
    public function redirect($url)
    {
        $this->di->response->redirect($this->di->url->create($url));
        exit;
    }
    
    
    /**
     * Retrieve flash messages from session.
     */
    public function retrieveMessages($labels = ['msg', 'err'])
    {
        foreach ($labels as $label) {
            $this->messages[$label] = $this->di->session->getOnce($label);
        }
    }
    
    
    /**
     * Return flash message.
     *
     * @param string $label     Message label.
     *
     * @return string|null      The requested message, or null if no message found.
     */
    public function getMessage($label = 'msg')
    {
        return (array_key_exists($label, $this->messages) ? $this->messages[$label] : null);
    }
    
    
    /**
     * Verify that there is a logged-in user.
     *
     * @param string    $url    Url to redirect to if verification fails.
     * @param bool      $admin  Whether to require admin status as well.
     *
     * @return \LRC\User\User   Model instance of the logged-in user.
     */
    public function verifyUser($url = 'user/login', $admin = false)
    {
        $user = $this->di->user->getCurrent();
        if (!$user) {
            $error = 'Du måste logga in för att kunna se den begärda sidan.';
        } elseif ($admin && !$user->admin) {
            $error = 'Du måste logga in som administratör för att kunna se den begärda sidan.';
        }
        
        if (!empty($error)) {
            $this->di->session->set('err', $error);
            $this->di->session->set('returnUrl', $this->di->request->getCurrentUrl());
            $this->redirect($url);
        }        
        return $user;
    }
    
    
    /**
     * Verify that there is a logged-in user with admin status.
     *
     * @param string    $url    Url to redirect to if verification fails.
     *
     * @return \LRC\User\User   Model instance of the logged-in user.
     */
    public function verifyAdmin($url = 'user/login')
    {
        return $this->verifyUser($url, true);
    }
    
    
    /**
     * Render a standard web page using a specific layout.
     *
     * @param string    $title      Page title.
     * @param string    $content    Page content.
     * @param array     $data       View data.
     * @param int       $status     HTTP status code.
     */
    public function renderPage($title, $content = '', $data = [], $status = 200)
    {
        $data['stylesheets'] = ['css/style.css'];
        
        // retrieve flash messages, if any
        $this->retrieveMessages();

        // common navbar and footer
        $this->di->view->add('default/navbar', [], 'navbar');
        $this->di->view->add('default/footer', [], 'footer');
        
        // page header
        $this->di->view->add('default/header', [
            'flash' => (!empty($data['flash']) ? $data['flash'] : null),
            'title' => $title
        ], 'header');
        
        // content
        if (!is_null($content)) {
            $this->di->view->add('default/main', [
                'content' => $content
            ]);
        }
        
        // comments
        if (!empty($data['comments']) && !empty($data['id'])) {
            $this->di->view->add('default/comments', [
                'contentId' => $data['id'],
                'comments' => $this->di->comments->getComments($data['id']),
                'user' => $this->di->user->getCurrent()
            ], 'main');
        }

        // render layout
        if (!isset($data['title'])) {
            $data['title'] = $title;
        }
        $this->di->view->add('default/layout', $data, 'layout');
        $body = $this->di->view->renderBuffered('layout');
        $this->di->response->setBody($body)->send($status);
        exit;
    }
}
