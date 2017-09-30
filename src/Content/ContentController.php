<?php

namespace LRC\Content;

use \LRC\Common\BaseController;

/**
 * Default controller for file-based content.
 */
class ContentController extends BaseController
{
    /**
     * Render default view.
     */
    public function defaultView()
    {
        // retrieve content
        $content = $this->di->content->get($this->di->request->getRoute());
        if (!$content) {
            return;
        }
        
        // render a standard page with default layout
        $this->di->common->renderPage(
            $this->di->textfilter->getTitleFromFirstH1($content->text),
            preg_replace('/<h1.*?>.*?<\/h1>/', '', $content->text),
            $content->frontmatter
        );
        return true;
    }
}
