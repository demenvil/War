<?php

function autoloadClass($className) {
    $filename = $className . '.php';
    if (is_readable($filename)) {
        require($filename);
    }
}

spl_autoload_register('autoloadClass');

/*EOF*/