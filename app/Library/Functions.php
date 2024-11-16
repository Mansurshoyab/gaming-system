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

if (!function_exists('normal_to_snake_case')) {
    /**
     * Convert a normal case string to snake_case.
     *
     * @param string $input
     * @return string
     */
    function normal_to_snake_case(string $input): string
    {
        try {
            if (empty($input)) {
                throw new InvalidArgumentException("The input string cannot be empty.");
            }
            $snakeCase = strtolower(str_replace(' ', '_', $input));
            return $snakeCase;
        } catch (InvalidArgumentException $e) {
            return "Error: " . $e->getMessage();
        } catch (Exception $e) {
            return "An unexpected error occurred: " . $e->getMessage();
        }
    }
}

if (!function_exists('normal_to_camel_case')) {
    /**
     * Convert a normal case string to camelCase.
     *
     * @param string $input
     * @return string
     */
    function normal_to_camel_case(string $input): string
    {
        try {
            if (empty($input)) {
                throw new InvalidArgumentException("The input string cannot be empty.");
            }
            $camelCase = lcfirst(str_replace(' ', '', ucwords(trim($input))));
            return $camelCase;
        } catch (InvalidArgumentException $e) {
            return "Error: " . $e->getMessage();
        } catch (Exception $e) {
            return "An unexpected error occurred: " . $e->getMessage();
        }
    }
}

if (!function_exists('normal_to_kebab_case')) {
    /**
     * Convert a normal case string to kebab-case.
     *
     * @param string $input
     * @return string
     */
    function normal_to_kebab_case(string $input): string
    {
        try {
            if (empty($input)) {
                throw new InvalidArgumentException("The input string cannot be empty.");
            }
            $kebabCase = strtolower(str_replace(' ', '-', trim($input)));
            return $kebabCase;
        } catch (InvalidArgumentException $e) {
            return "Error: " . $e->getMessage();
        } catch (Exception $e) {
            return "An unexpected error occurred: " . $e->getMessage();
        }
    }
}

if (!function_exists('snake_to_camel_case')) {
    /**
     * Convert a snake_case string to camelCase.
     *
     * @param string $input
     * @return string
     */
    function snake_to_camel_case(string $input): string
    {
        try {
            if (empty($input)) {
                throw new InvalidArgumentException("The input string cannot be empty.");
            }
            $camelCase = lcfirst(str_replace('_', '', ucwords($input, '_')));
            return $camelCase;
        } catch (InvalidArgumentException $e) {
            return "Error: " . $e->getMessage();
        } catch (Exception $e) {
            return "An unexpected error occurred: " . $e->getMessage();
        }
    }
}

if (!function_exists('snake_to_kebab_case')) {
    /**
     * Convert a snake_case string to kebab-case.
     *
     * @param string $input
     * @return string
     */
    function snake_to_kebab_case(string $input): string
    {
        try {
            if (empty($input)) {
                throw new InvalidArgumentException("The input string cannot be empty.");
            }
            $kebabCase = str_replace('_', '-', $input);
            return $kebabCase;
        } catch (InvalidArgumentException $e) {
            return "Error: " . $e->getMessage();
        } catch (Exception $e) {
            return "An unexpected error occurred: " . $e->getMessage();
        }
    }
}
