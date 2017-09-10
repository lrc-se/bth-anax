<?php

namespace LRC\App;

/**
 * Default controller for file-based content.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class ContentController extends BaseController
{
    /**
     * Default view.
     */
    public function defaultView()
    {
        // retrieve content
        $content = $this->app->content->get($this->app->request->getRoute());
        if (!$content) {
            return;
        }
        
        // render a standard page with default layout
        $this->app->renderPage($this->app->textfilter->getTitleFromFirstH1($content->text), preg_replace('/<h1.*?>.*?<\/h1>/', '', $content->text), $content->frontmatter);
        exit;
    }
}
