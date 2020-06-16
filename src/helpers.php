<?php

if (!function_exists('replace_placeholder')) {

    /**
     * 使用正则替换点位符，占位符里不能出现正则的特殊字符，
     * @param string $subject 要替换的文本
     * @param array $data 占位符及数据的数组
     * @return string
     */
    function replace_placeholder($subject, $data): string
    {
        return preg_replace(array_map(function ($item) {
            return "/" . $item . "/";
        }, array_keys($data)), array_values($data), $subject);

    }

}
