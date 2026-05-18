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

function loadPartial($name)
{
    $partialPath = basePath("App/views/partials/{$name}.php");

    if (file_exists($partialPath)) {
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
