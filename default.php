<?php
require_once 'router.php';

try {
    (new Router())->route()->display();
} catch (Exception $e) {
    echo $e->getMessage();
}