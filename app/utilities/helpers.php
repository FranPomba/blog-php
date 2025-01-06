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
        if (strlen(trim($text)) <= $limite) {
            return $text;
        }
        $summary = substr($text, 0, stripos(substr($text, 0, $limite), '')) . '...';
        return $summary;
    }
}
