<?php

use Random\Randomizer;

/*----------------------------------------*
 * Useful
 *----------------------------------------*/

if (!function_exists("zeroPadding")) {

    /**
     * numの前に0をdigit分埋める
     *
     * @param int $digit
     * @param int|string $num
     * @return string
     */
    function zeroPadding(int $digit, int|string $num): string
    {
        return sprintf("%0" . $digit . "d", $num);
    }
}



/*----------------------------------------*
 * Random
 *----------------------------------------*/

if (!function_exists("randomNumber")) {

    /**
     * digit桁のランダムな数字を取得する
     *
     * @param int $digit
     * @return int
     */
    function randomNumber(int $digit = 16): int
    {
        // Randomizerクラスのインスタンスを作成する
        $randomizer = new Randomizer();

        // digit桁のランダムな数字を取得する
        return (int)$randomizer->getBytesFromString("0123456789", $digit);
    }
}

if (!function_exists("randomFloat")) {

    /**
     * 0から1までのランダムな数字を取得する
     *
     * @return float
     */
    function randomFloat(): float
    {
        // Randomizerクラスのインスタンスを作成する
        $randomizer = new Randomizer();

        // 0から1までのランダムな数字を取得する
        return $randomizer->nextFloat();
    }
}
