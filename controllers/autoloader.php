<?php
/**
 * A simple autoloader function, PSR4 compliant.
 *
 * Namespace components are converted into sub-directories, all characters
 * are converted to lowercase.
 */
function class_loader($class)
{
    $fullPath = $_SERVER['DOCUMENT_ROOT'] . '/class/' . strtolower(str_replace('\\', '/', $class)) . '.class.php';
    if (!file_exists($fullPath)) {
        die("<p>The class $class was not found</p>");
    }
    include "$fullPath";
}
spl_autoload_register('class_loader');
// vim:set expandtab tabstop=4 shiftwidth=4 softtabstop=4: