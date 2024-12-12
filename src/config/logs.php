<?

namespace framework\config;

$projectRoot = dirname(__DIR__, 2);

$logLevel = getenv('LOG_LEVEL') ?: 'info';

return [
    'log_file' => $projectRoot . '/app/infrastructure/storage/logs.log',
    'log_level' => 'info',
    'project_root' => $projectRoot,
];
