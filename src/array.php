<?php

/*----------------------------------------*
 * Useful
 *----------------------------------------*/

if (!function_exists("arrayShuffle")) {

    /**
     * 配列をシャッフルする
     * isMaintainKeyがtrueの場合はkeyを維持する
     *
     * @param array $array
     * @param bool $isMaintainKey
     * @return array
     */
    function arrayShuffle(array $array, bool $isMaintainKey = true): array
    {
        // 配列のkeyを取得する
        $keys = array_keys($array);

        // keyをシャッフルする
        shuffle($keys);

        // シャッフルしたkeyを使って配列を作り直す
        $tmp = [];
        foreach ($keys as $key) {
            if ($isMaintainKey) {
                $tmp[$key] = $array[$key];
            } else {
                $tmp[] = $array[$key];
            }
        }

        return $tmp;
    }
}

if (!function_exists("arrayMergeUnique")) {

    /**
     * 配列をユニークにマージする
     *
     * @param array $source
     * @param array $target
     * @return array
     */
    function arrayMergeUnique(array $source, array $target): array
    {
        // 配列同士をマージする
        $array = array_merge($source, $target);

        // ユニークにする
        $array = array_unique($array);

        // キーを振り直す
        $array = array_values($array);

        return $array;
    }
}

if (!function_exists("arrayRemoveEmpty")) {

    /**
     * 配列から「null」「空文字」「0」「"0"」「false」「空配列」を取り除く
     *
     * @param array $array
     * @return array
     */
    function arrayRemoveEmpty(array $array): array
    {
        // バッファーを作成する
        $tmp = [];

        // 配列をループする
        foreach ($array as $item) {
            // 要素が空の場合はスキップする
            if (empty($item)) continue;

            // 要素が配列の場合は再帰的に呼び出す
            if (is_array($item)) {
                $value = arrayRemoveEmpty($item);

                // 再帰的に呼び出した結果が空でない場合はバッファーに追加する
                if (!empty($value)) $tmp[] = $value;

                continue;
            }

            // 要素が空でない場合はバッファーに追加する
            $tmp[] = $item;
        }

        return $tmp;
    }
}



/*----------------------------------------*
 * Search
 *----------------------------------------*/

if (!function_exists("arraySearchKey")) {

    /**
     * 他次元配列からcolumnの値がneedleな配列のkeyを検索する
     *
     * @param array<array> $haystack
     * @param string|int $column
     * @param mixed $needle
     * @return string|int|null
     */
    function arraySearchKey(array $haystack, string|int $column, mixed $needle): string|int|null
    {
        // haystackからcolumnの値だけを取り出す
        $values = array_column($haystack, $column);

        // needleの値と一致するkeyを取り出す
        $key = array_search($needle, $values);

        return $key;
    }
}

if (!function_exists("arraySearchValue")) {

    /**
     * 他次元配列からcolumnの値がneedleな配列を検索する
     *
     * @param array<array> $haystack
     * @param string|int $column
     * @param mixed $needle
     * @return mixed
     */
    function arraySearchValue(array $haystack, string|int $column, mixed $needle): mixed
    {
        // arraySearchKeyを使ってkeyを取得する
        $key = arraySearchKey($haystack, $column, $needle);

        // keyを使ってvalueを取得する
        return isset($haystack[$key]) ? $haystack[$key] : null;
    }
}
