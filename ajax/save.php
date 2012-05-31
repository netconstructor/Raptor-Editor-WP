<?php

// @todo return actual errors
class RaptorSave {

    public function save() {

        if (!isset($_POST['raptor-save-type'])) {
            return;
        }

        $data = $this->extractData('raptor-save-data');
        if (!$data) {
            echo json_encode(false);
            return;
        }

        switch ($_POST['raptor-save-type']) {
            case 'save-posts':
                return $this->savePosts($data);
            case 'save-comments':
                return $this->saveComments($data);
            default:
                return false;
        }
    }

    public function savePosts(array $posts) {

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
        $data = json_decode($_POST[$key]));

        if (!$data) {
            return false;
        }

        return $data;
    }
}

$raptorSave = new RaptorSave();
$result = $raptorSave->save();

echo json_encode($result);
