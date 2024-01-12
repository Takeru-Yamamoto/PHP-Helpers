<?php

use Random\Randomizer;

/*----------------------------------------*
 * Useful
 *----------------------------------------*/

if (!function_exists("removeFromEnd")) {

    /**
     * textの後ろからnum文字分取り除く
     *
     * @param string $text
     * @param int $num
     * @return string
     */
    function removeFromEnd(string $text, int $num): string
    {
        return mb_substr($text, 0, (-1 * $num));
    }
}



/*----------------------------------------*
 * Random
 *----------------------------------------*/

if (!function_exists("randomText")) {

    /**
     * lengthの長さのランダムなテキストを取得する
     *
     * @param string $source
     * @param int $length
     * @return string
     */
    function randomText(string $source, int $length = 16): string
    {
        // Randomizerクラスのインスタンスを作成する
        $randomizer = new Randomizer();

        // lengthの長さのランダムなアルファベットを取得する
        return $randomizer->getBytesFromString($source, $length);
    }
}

if (!function_exists("randomAlphabet")) {

    /**
     * lengthの長さのランダムなアルファベットを取得する
     *
     * @param int $length
     * @return string
     */
    function randomAlphabet(int $length = 16): string
    {
        // lengthの長さのランダムなアルファベットを取得する
        return randomText("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", $length);
    }
}

if (!function_exists("randomAlphabetLower")) {

    /**
     * lengthの長さのランダムな小文字のアルファベットを取得する
     *
     * @param int $length
     * @return string
     */
    function randomAlphabetLower(int $length = 16): string
    {
        // lengthの長さのランダムな小文字のアルファベットを取得する
        return randomText("abcdefghijklmnopqrstuvwxyz", $length);
    }
}

if (!function_exists("randomAlphabetUpper")) {

    /**
     * lengthの長さのランダムな大文字のアルファベットを取得する
     *
     * @param int $length
     * @return string
     */
    function randomAlphabetUpper(int $length = 16): string
    {
        // lengthの長さのランダムな大文字のアルファベットを取得する
        return randomText("ABCDEFGHIJKLMNOPQRSTUVWXYZ", $length);
    }
}

if (!function_exists("randomPassword")) {

    /**
     * lengthの長さのランダムなパスワードを取得する
     * 生成されるパスワードは、大文字・小文字・数字の中からランダムに選ばれる
     * symbolsに記号が指定されている場合は、候補の中に記号も含まれる
     *
     * @param int $length
     * @param string $symbols
     * @return string
     */
    function randomPassword(int $length = 16, string $symbols = ""): string
    {
        // lengthの長さのランダムなパスワードを取得する
        return randomText("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" . $symbols, $length);
    }
}



/*----------------------------------------*
 * Naming Convention
 *----------------------------------------*/

if (!function_exists("toLower")) {

    /**
     * textを小文字に変換する
     *
     * @param string $text
     * @return string
     */
    function toLower(string $text): string
    {
        return mb_strtolower($text, "UTF-8");
    }
}

if (!function_exists("toUpper")) {

    /**
     * textを大文字に変換する
     *
     * @param string $text
     * @return string
     */
    function toUpper(string $text): string
    {
        return mb_strtoupper($text, "UTF-8");
    }
}



/*----------------------------------------*
 * Convert Kana
 *----------------------------------------*/

if (!function_exists("convertToHalfNumeric")) {

    /**
     * textの中の全角数字を半角に変換する
     *
     * @param string $text
     * @return string
     */
    function convertToHalfNumeric(string $text): string
    {
        return mb_convert_kana($text, "n");
    }
}



/*----------------------------------------*
 * NewLine
 *----------------------------------------*/

if (!function_exists("replaceNl")) {

    /**
     * 改行コードを置換する
     *
     * @param string $text
     * @param string $replace
     * @return string
     */
    function replaceNl(string $text, string $replace): string
    {
        return str_replace(["\r\n", "\n\r", "\r", "\n"], $replace, $text);
    }
}

if (!function_exists("removeNl")) {

    /**
     * textから改行コードを取り除く
     *
     * @param string $text
     * @return string
     */
    function removeNl(string $text): string
    {
        return replaceNl($text, "");
    }
}



/*----------------------------------------*
 * Space
 *----------------------------------------*/

if (!function_exists("removeSpace")) {

    /**
     * textからスペースを取り除く
     *
     * @param string $text
     * @return string
     */
    function removeSpace(string $text): string
    {
        return str_replace([" ", "　"], "", $text);
    }
}

if (!function_exists("removeHalfSpace")) {

    /**
     * textから半角スペースを取り除く
     *
     * @param string $text
     * @return string
     */
    function removeHalfSpace(string $text): string
    {
        return str_replace(" ", "", $text);
    }
}

if (!function_exists("removeDoubleSpace")) {

    /**
     * textから全角スペースを取り除く
     *
     * @param string $text
     * @return string
     */
    function removeDoubleSpace(string $text): string
    {
        return str_replace("　", "", $text);
    }
}

if (!function_exists("convertToHalfSpace")) {

    /**
     * textの全角スペースを半角スペースに変換する
     *
     * @param string $text
     * @return string
     */
    function convertToHalfSpace(string $text): string
    {
        return str_replace("　", " ", $text);
    }
}



/*----------------------------------------*
 * Check Text
 *----------------------------------------*/

if (!function_exists("isHiragana")) {

    /**
     * textがすべてひらがなで構成されているか
     *
     * @param string $text
     * @return bool
     */
    function isHiragana(string $text): bool
    {
        return !preg_match("/[^ぁ-んー]/u", $text);
    }
}


if (!function_exists("isKatakana")) {

    /**
     * textがすべてカタカナで構成されているか
     *
     * @param string $text
     * @return bool
     */
    function isKatakana(string $text): bool
    {
        return !preg_match("/[^ァ-ヶー]/u", $text);
    }
}


if (!function_exists("isKanji")) {

    /**
     * textがすべて漢字で構成されているか
     *
     * @param string $text
     * @return bool
     */
    function isKanji(string $text): bool
    {
        return !preg_match("/[^一-龠]/u", $text);
    }
}


if (!function_exists("isAlphabet")) {

    /**
     * textがすべてアルファベットで構成されているか
     *
     * @param string $text
     * @return bool
     */
    function isAlphabet(string $text): bool
    {
        return !preg_match("/[^a-zA-Z]/u", $text);
    }
}


if (!function_exists("isAlphabetUpper")) {

    /**
     * textがすべて大文字のアルファベットで構成されているか
     *
     * @param string $text
     * @return bool
     */
    function isAlphabetUpper(string $text): bool
    {
        return !preg_match("/[^A-Z]/u", $text);
    }
}


if (!function_exists("isAlphabetLower")) {

    /**
     * textがすべて小文字のアルファベットで構成されているか
     *
     * @param string $text
     * @return bool
     */
    function isAlphabetLower(string $text): bool
    {
        return !preg_match("/[^a-z]/u", $text);
    }
}


if (!function_exists("isAlphabetDouble")) {

    /**
     * textがすべて全角アルファベットで構成されているか
     *
     * @param string $text
     * @return bool
     */
    function isAlphabetDouble(string $text): bool
    {
        return !preg_match("/[^ａ-ｚＡ-Ｚ]/u", $text);
    }
}


if (!function_exists("isAlphabetUpperDouble")) {

    /**
     * textがすべて大文字の全角アルファベットで構成されているか
     *
     * @param string $text
     * @return bool
     */
    function isAlphabetUpperDouble(string $text): bool
    {
        return !preg_match("/[^Ａ-Ｚ]/u", $text);
    }
}


if (!function_exists("isAlphabetLowerDouble")) {

    /**
     * textがすべて小文字の全角アルファベットで構成されているか
     *
     * @param string $text
     * @return bool
     */
    function isAlphabetLowerDouble(string $text): bool
    {
        return !preg_match("/[^ａ-ｚ]/u", $text);
    }
}



/*----------------------------------------*
 * HTML
 *----------------------------------------*/

if (!function_exists("brToNl")) {

    /**
     * brタグを改行コードに変更
     *
     * @param string $text
     * @return string
     */
    function brToNl(string $text): string
    {
        return preg_replace("/\<br(\s*)?\/?\>/i", PHP_EOL, $text);
    }
}

if (!function_exists("nlToBr")) {

    /**
     * 改行コードをbrタグに変更
     * nl2br()と違い、改行コードは削除される
     *
     * @param string $text
     * @return string
     */
    function nlToBr(string $text): string
    {
        return replaceNl($text, "<br>");
    }
}

if (!function_exists("escapeHtml")) {

    /**
     * textをHTMLエスケープする
     *
     * @param string $text
     * @param string $charset
     * @param bool $doubleEncode
     * @return string
     */
    function escapeHtml(string $text, string $charset = "UTF-8", bool $doubleEncode = true): string
    {
        return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, $charset, $doubleEncode);
    }
}
