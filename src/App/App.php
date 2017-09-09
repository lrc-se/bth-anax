<?php

namespace LRC\App;

/**
 * An App class to wrap the resources of the framework.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class App
{
    /**
     * Redirect to URL.
     */
    public function redirect($url)
    {
        $this->response->redirect($this->url->create($url));
        exit;
    }
    
    
    /**
     * Escape output.
     */
    public function esc($text)
    {
        return htmlspecialchars($text);
    }


    /**
     * Render a standard web page using a specific layout.
     */
    public function renderPage($title, $content = '', $data = [], $status = 200)
    {
        $data['stylesheets'] = ['css/style.css'];

        // Add common navbar and footer
        $this->view->add('default/navbar', [], 'navbar');
        $this->view->add('default/footer', [], 'footer');
        
        $this->view->add('default/header', [
            'flash' => (!empty($data['flash']) ? $data['flash'] : null),
            'title' => $title
        ], 'header');
        if (!is_null($content)) {
            $this->view->add('default/main', [
                'content' => $content
            ]);
        }
        if (!empty($data['comments']) && !empty($data['id'])) {
            $this->view->add('default/comments', [
                'contentId' => $data['id'],
                'comments' => $this->comments->getComments($data['id']),
                'user' => $this->user->getCurrent()
            ], 'main');
        }

        // Add layout, render it, add to response and send.
        if (!isset($data['title'])) {
            $data['title'] = $title;
        }
        $this->view->add('default/layout', $data, 'layout');
        $body = $this->view->renderBuffered('layout');
        $this->response->setBody($body)->send($status);
        exit;
    }
}
