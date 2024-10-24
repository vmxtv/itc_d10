<?php declare(strict_types = 1);
$files = [];
if (file_exists(__DIR__ . '/../../../core/modules/views/views.theme.inc')) {
  $files[] = __DIR__ . '/../../../core/modules/views/views.theme.inc';
}
if ($webRoot = getenv('_WEB_ROOT')) {
  $files[] = $webRoot . '/core/modules/views/views.theme.inc';
}
return [
  'parameters' => [
    'scanFiles' => $files,
  ],
];
