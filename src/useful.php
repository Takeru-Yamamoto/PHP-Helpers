<?php

if (!function_exists("varDump")) {

    /**
     * var_dump の簡略化
     *
     * @param mixed $any
     * @return void
     */
    function varDump(mixed $any): void
    {
        echo "<pre>";
        var_dump($any);
        echo "</pre>";
    }
}

if (!function_exists("jsonEncode")) {

    /**
     * json_encode の簡略化
     *
     * @param mixed $any
     * @return string|false
     */
    function jsonEncode(mixed $any): string|false
    {
        return json_encode($any, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}

if (!function_exists("className")) {

    /**
     * インスタンスのクラス名を取得する
     *
     * @param object|string $classPath
     */
    function className(object|string $classPath): string
    {
        // インスタンスの場合はクラス名を取得する
        if (is_object($classPath)) $classPath = get_class($classPath);

        // クラスパスを配列にする
        $array = explode("\\", $classPath);

        // クラス名を取得する
        return end($array);
    }
}
