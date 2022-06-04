<?php
    error_reporting(0);

    function displayError($error, $index) {
        $msg = '';
        if(isset($error[$index])) {
            $msg = '<span class="error">' . $error[$index] . '</span>';
        }
        return $msg;
    }

    function updateForm($data, $index) {
        if(isset($data[$index]) && !empty($data[$index]) && trim($data[$index])) {
            return true;
        } else {
            return false;
        }
    }
?>