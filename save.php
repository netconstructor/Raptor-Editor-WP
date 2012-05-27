<?php

// If post content data isn't set
if (!isset($_POST['raptor-post-content'])
    // Or it is falsy
    || !$_POST['raptor-post-content']
    // Or json_decode can't decode it successfully
    || $posts = json_decode($_POST['raptor-post-content'])) {
    foreach ($posts as $id => $post) {
        // @todo actually save
    }
}