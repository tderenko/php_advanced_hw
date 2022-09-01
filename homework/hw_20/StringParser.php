<?php


namespace homework\hw_20;

class StringParser
{
    /**
     *  1. Напишіть скрипт PHP, який видаляє останнє слово з рядка.
        Зразок рядка: "The quick brown fox"
        Очікуваний результат: швидкий коричневий
     */
    public static function rmLastWord(string $text): string
    {
        return preg_replace('/\s+\w+$/', '', $text);
    }

    /**
     *  2. Напишіть сценарій PHP, який видаляє пробіли з рядка.
        Зразок рядка: "The quick brown fox"
        Очікуваний результат: Thequick""brownfox
     */
    public static function rmSpaces(string $text): string
    {
        return preg_replace('/\s/', '', 'The quick brown fox');
    }

    /**
     *  3. Напишіть сценарій PHP для видалення нечислових символів, крім коми та крапки.
        Зразок рядка: "$123,34.00A"
        Очікуваний результат: 12 334,00
     */
    public static function rmNonNumeric(string $text): string
    {
        return preg_replace('/[^\d,.]/', '', '123,34.00A');
    }

    /**
     *  4. Напишіть сценарій PHP для вилучення тексту (в дужках) із рядка.
        Зразки рядків: "The quick brown [fox]"
        Очікуваний результат: "fox"
     */
    public static function grepFromBracket(string $text): array
    {
        preg_match_all('/(?<=\[)[^\]]+?(?=\])/', $text, $matches);
        return $matches[0];
    }

    /**
     *  5. Напишіть сценарій PHP, щоб видалити всі символи з рядка, крім a-z A-Z 0-9 або " ".
        Зразок рядка: abcde$ddfd @abcd )der]
        Очікуваний результат: abcdeddfd abcd der
     */
    public static function rmAddSymbols()
    {
        return preg_replace('/[^a-zA-Z0-9 ]/', '', 'abcde$ddfd @abcd )der]');
    }
}
