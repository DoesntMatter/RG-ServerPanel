<?php

class tplglobals {

    function current_user() {
        global $current_user;
        return $current_user;
    }

    function STATUS() {
        global $STATUS;
        return $STATUS;
    }

    function rooturl() {
        return Request::instance()->base_url;
    }
}