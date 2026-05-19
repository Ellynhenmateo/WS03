<?php

/** 
 * Get the path
 * @param string &path
 * return string
 */

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

/**
 * Load view
 * @param string $view
 * return void
 */

function loadView($name, $data = [])
{
    $viewPath = basePath("App/views/{$name}.view.php");
    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View {$name} not found: $viewPath";
    }
}

/**
 * Load partial view
 * @param string $name
 * return void
 */

function loadPartial($name, $data = [])
{
    $partialPath = basePath("App/views/partials/{$name}.php");

    if (file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        echo "Partial {$name} not found: $partialPath";
    }
}

function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function escape($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function formatSalary($salary)
{
    $cleanSalary = str_replace([',', ' ', '₱'], '', $salary);

    return '₱' . number_format((float)$cleanSalary);
}

function inspectAndDie($value)
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

/**
 * Sanitize input data
 * 
 * @param string dirty
 * @return string
 */

function sanitize($dirty) {
    return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}
/**
 * Redirect to a giver URL
 * @param string url
 * @return void
 */ 
function redirect($url){
    header("Location: {$url}");
    exit;
}
