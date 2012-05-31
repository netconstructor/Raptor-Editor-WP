<?php
class RaptorSave {

    const SAVE_POSTS = 'save-posts';
    const SAVE_COMMENTS = 'save-comments';

    public function savePosts() {
        var_dump($_POST);

        $data = $this->extractData('raptor-save-data');
        if (!$data) {
            echo json_encode(false);
            return;
        }
    }

    public function saveComments(array $posts) {

    }

    public function checkData($key) {
        // If post content data isn't set
        if (!isset($_POST[$key])) {
            return false;
        }
            // Or it is falsy
        if (!$_POST[$key]) {
            return false;
        }
        // Or json_decode can't decode it successfully
        $data = json_decode($_POST[$key]);

        if (!$data) {
            return false;
        }

        return $data;
    }
}
