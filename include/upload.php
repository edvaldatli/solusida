<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 1.3.2016
 * Time: 13:50
 */

class UPLOAD {

    protected $uploaded = [];
    protected $destination;
    protected $max = 51200;
    protected $messages = [];
    protected $permitted = [
        'image/jpeg',
        'image/pjpeg',
        'image/png'
    ];

    public function __construct($path) {

        if (!is_dir($path) || !is_writable($path)) {

            throw new \Exception("$path must be a valid, writable directory.");
        }
        $this->destination = $path;     # við vísum í breytu/property með breytuheiti, en sleppum $

    }

    public function upload() {

        $uploaded = current($_FILES);

        if ($this->checkFile($uploaded)) {

            # upload file
            $this->moveFile($uploaded);
        }
    }

    public function getMessages() {
        return $this->messages;
    }

    protected function checkFile($file) {
        return true;
    }

    protected function moveFile($file) {

        $salt = uniqid(time());
        $file['name'] = $salt . $file['name'];
        $success = move_uploaded_file($file['tmp_name'], $this->destination . $file['name']);

        if ($success) {
            $result = $file['name'] . ' was uploaded successfully';
            $this->messages[] = $result;
        } else {
            $this->messages[] = 'Could not upload ' . $file['name'];
        }
    }
}