<?php

namespace app\utilities;

class Helpers
{
    public static function url($url = null): string
    {
        $protocol = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https://" : "http://";
        $host = getenv('HTTP_HOST') !== false ? getenv('HTTP_HOST') : $_SERVER['HTTP_HOST'];
        return 'http://' . $host . '/' . $url;
    }

    public static function redirect(string $url = null): void
    {
        header('HTTP/1.1 302 found');
        $local = ($url ? self::url($url) : self::url());
        header("Location: {$local} ");
        exit();
    }
    public static function summarizeText(string $text, int $limite)
    {
       $textClear = trim($text);
        if (strlen($textClear) <= $limite) {
            return $textClear;
        }
        $summary = substr($textClear, 0, strripos(substr($textClear, 0, $limite), '')) . '...';
         
        return $summary;
    }

    public static function countTime(string $data)
    {
        $current = strtotime(date('Y-m-d H:i:s'));
        $time = strtotime($data);
        $diference = $current - $time;

        $sec = $diference;
        $min = round($sec / 60);
        $hour = round($sec / 3600);
        $day = round($sec / 86400);
        $week = round($sec / 604800);
        $month = round($sec / 2419200);
        $year =  round($sec / 29030400);

        if ($sec <= 60) {
            return "Agora mesmo";
        } elseif ($min <= 60) {
            return "Há $min min";
        } elseif ($hour <= 24) {
            return "Há $hour horas";
        } elseif ($day <= 1) {
            return "Há $day dias";
        } elseif ($week <= 4) {
            return "Há $week semanas";
        } elseif ($month <= 12) {
            return "Há $month meses";
        } else {
            return $year == 1 ? "Há um ano" : "Há $year anos";
        }
    }
}
