<?php

namespace App\Libraries;

class Utils
{
    public static function uploadImage($image)
    {
        $config['upload_path'] = getcwd() . '/images';
        $image_name = $image->getName();

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 077);
        }

        if (!$image->hasMoved()) {
            $image->move($config['upload_path'], $image_name.'');
        }

        return $image_name;
    }

    public static function slugify($text)
    {
        // Strip html tags
        $text = strip_tags($text);
        // Replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // Transliterate
        setlocale(LC_ALL, 'en_US.utf8');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // Trim
        $text = trim($text, '-');
        // Remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // Lowercase
        $text = strtolower($text);
        // Check if it is empty
        if (empty($text)) {
            return 'n-a';
        }
        // Return result
        return $text;
    }
}
