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
     * Escape output.
     *
     * @param string $text  Text to escape.
     *
     * @return string       Escaped text.
     */
    public function esc($text)
    {
        return htmlspecialchars($text);
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
