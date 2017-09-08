<?php
/**
 * Routes for flat file content.
 */
$app->router->always(function () use ($app) {
    // Get the current route and see if it matches a content/file
    $path = $app->request->getRoute();
    $file1 = ANAX_INSTALL_PATH . "/content/$path.md";
    $file2 = ANAX_INSTALL_PATH . "/content/$path/index.md";

    $file = (is_file($file2) ? $file2 : (is_file($file1) ? $file1 : null));
    if (!$file) {
        return;
    }

    // Check that file is really in the right place
    $real = realpath($file);
    $base = realpath(ANAX_INSTALL_PATH . '/content/');
    if (strncmp($base, $real, strlen($base))) {
        return;
    }

    // Get content from markdown file
    $content = $app->textfilter->parse(file_get_contents($file), ['yamlfrontmatter', 'shortcode', 'markdown', 'titlefromheader']);
    $flash = (isset($content->frontmatter['flash']) ? $content->frontmatter['flash'] : null);
    $contentId = (isset($content->frontmatter['id']) ? $content->frontmatter['id'] : null);

    // Render a standard page using layout
    /*$app->view->add('default/header', [
        'flash' => $flash,
        'title' => $app->textfilter->getTitleFromFirstH1($content->text)
    ], 'header');
    $app->view->add('default/main', [
        'content' => preg_replace('/<h1.*?>.*?<\/h1>/', '', $content->text)
    ], 'main');
    if (!empty($content->frontmatter['comments']) && $contentId) {
        $app->view->add('default/comments', [
            'contentId' => $contentId,
            'comments' => $app->comments->getComments($contentId),
            'user' => $app->user->getCurrent()
        ], 'main');
    }*/
    $app->renderPage($app->textfilter->getTitleFromFirstH1($content->text), preg_replace('/<h1.*?>.*?<\/h1>/', '', $content->text), $content->frontmatter);
});
