<?php

$this->renderView('default/header', ['title' => (isset($title) ? $title : '(Unknown status)')]);
$this->renderView('default/main', ['content' => (isset($message) ? $message : '(Unknown message)')]);
