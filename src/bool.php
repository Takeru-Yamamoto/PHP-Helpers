<?php

use Random\Randomizer;

/*----------------------------------------*
 * Useful
 *----------------------------------------*/

if (!function_exists("boolString")) {

    /**
     * bool値を文字列に変換する
     *
     * @param bool $bool
     */
    function boolString(bool $bool): string
    {
        return $bool ? "true" : "false";
    }
}



/*----------------------------------------*
 * Random
 *----------------------------------------*/

if (!function_exists("isRandomTrue")) {

    /**
     * ランダムなbool値を取得する
     *
     * @param string|int|float $probability
     * @param bool $isPercent
     * @return bool
     */
    function isRandomTrue(string|int|float $probability = 0.5, bool $isPercent = false): bool
    {
        // probabilityが文字列の場合はfloatに変換する
        if (is_string($probability)) $probability = (float)$probability;

        // probabilityが0以下の場合はfalseを返す
        if ($probability <= 0) return false;

        // isPercentがfalseであり、probabilityが1以上の場合はtrueを返す
        if (!$isPercent && $probability >= 1) return true;

        // isPercentがtrueの場合はprobabilityを100で割る
        if ($isPercent) $probability /= 100;

        // Randomizerクラスのインスタンスを作成する
        $randomizer = new Randomizer();

        // ランダムな0から1までの数字がprobabilityより小さいかどうかを返す
        return $randomizer->nextFloat() < $probability;
    }
}
