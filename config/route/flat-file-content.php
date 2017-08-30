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

    // Render a standard page using layout
    $app->view->add('default1/article', [
        'content' => $content->text
    ]);
    $app->renderPage($content->frontmatter);
});