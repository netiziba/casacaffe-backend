<?php

$defaults = [
    'http://localhost:5173',
    'http://127.0.0.1:5173',
    'http://localhost:8080',
    'http://127.0.0.1:8080',
];

$extra = array_filter(array_map(
    static fn (string $s): string => rtrim($s, '/'),
    array_filter(array_map('trim', explode(',', (string) env('CORS_ALLOWED_ORIGINS', ''))))
));

$frontend = env('FRONTEND_URL');
if (is_string($frontend) && trim($frontend) !== '') {
    $extra[] = rtrim(trim($frontend), '/');
}

$allowedOrigins = array_values(array_unique(array_filter(array_merge($defaults, $extra))));

$patterns = [];
if (filter_var(env('CORS_ALLOW_VERCEL_PREVIEWS', false), FILTER_VALIDATE_BOOLEAN)) {
    // z. B. https://casacaffe-menu-xyz123.vercel.app
    $patterns[] = '#^https://[a-zA-Z0-9\-]+\.vercel\.app$#';
}
$customPattern = env('CORS_ORIGIN_PATTERN');
if (is_string($customPattern) && $customPattern !== '') {
    $patterns[] = $customPattern;
}

return [
    'paths' => ['api/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => $allowedOrigins,
    'allowed_origins_patterns' => array_values(array_filter($patterns)),
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
