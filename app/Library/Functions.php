<?php
if (!function_exists('version')) {
    /**
     * Get system build version.
     *
     * @return string|null
     */
    function version()
    {
        try {
            $commit = trim(shell_exec('git rev-list --count HEAD'));
            $commit = $commit ?: '0';
            $major = floor($commit / 10000);
            $minor = floor(($commit % 10000) / 100);
            $patch = $commit % 100;
            return sprintf('%d.%d.%d', $major, $minor, $patch);
        } catch (Exception $e) {
            return '0.0.0';
        }
    }
}
