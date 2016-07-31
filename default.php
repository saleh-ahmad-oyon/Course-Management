<?php
require_once 'router.php';

try {
    (new Router())->route();
} catch (Exception $e) {
        echo $e->getMessage();
}