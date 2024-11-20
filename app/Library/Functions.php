<?php

use App\Enums\GlobalUsage\Status;
use App\Enums\UserManagement\Approval;

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

if (!function_exists('fullname')) {
    /**
     * Get system build version.
     *
     * @return string|null
     */
    function fullname(object $object)
    {
        try {
            $name = $object->firstname . ' ' . $object->lastname;
            return $name;
        } catch (Exception $e) {
            return 'Not Available';
        }
    }
}

if (!function_exists('status')) {
    /**
     * Get status value.
     *
     * @param  string  $value
     * @return string|null
     */
    function status($value) {
        $status = Status::fetch();
        if (in_array($value, $status)) {
            return $value;
        }
        return null;
    }
}

if (!function_exists('approval')) {
    /**
     * Get approval value.
     *
     * @param  string  $value
     * @return string|null
     */
    function approval($value) {
        $approval = Approval::fetch();
        if (in_array($value, $approval)) {
            return $value;
        }
        return null;
    }
}
