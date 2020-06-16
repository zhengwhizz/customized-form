<?php

if (!function_exists('replace_placeholder')) {

    function replace_placeholder($subject, $data): string
    {
        return preg_replace(array_map(function ($item) {
            return "/" . $item . "/";
        }, array_keys($data)), array_values($data), $subject);

    }

}
