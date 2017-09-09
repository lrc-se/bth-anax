<?php

namespace LRC\App;

/**
 * Service for file-based content.
 */
class ContentService
{
    /**
     * @var \Anax\Textfilter $textfilter    Textfilter reference.
     */
    private $textfilter;
    
    
    /**
     * Constructor.
     *
     * @param \Anax\Textfilter $textfilter  Textfilter reference.
     */
    public function __construct($textfilter)
    {
        $this->textfilter = $textfilter;
    }
    
    
    /**
     * Get file-based content by path.
     *
     * @param string $path
     *
     * @return array
     */
    public function get($path)
    {
        // Get the current route and see if it matches a content/file
        $file1 = ANAX_INSTALL_PATH . "/content/$path.md";
        $file2 = ANAX_INSTALL_PATH . "/content/$path/index.md";
    
        $file = (is_file($file2) ? $file2 : (is_file($file1) ? $file1 : null));
        if (!$file) {
            return null;
        }
    
        // Check that file is really in the right place
        $real = realpath($file);
        $base = realpath(ANAX_INSTALL_PATH . '/content/');
        if (strncmp($base, $real, strlen($base))) {
            return null;
        }
    
        // Get content from markdown file
        return $this->textfilter->parse(file_get_contents($file), ['yamlfrontmatter', 'shortcode', 'markdown', 'titlefromheader']);
    }
}
