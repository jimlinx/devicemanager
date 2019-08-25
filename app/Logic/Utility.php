<?php


namespace App\Logic;


class Utility
{
    public static function parseIds($data)
    {
        $idArray  = Array();
        foreach ($data as $key => $value) {
            $id = strtok($key, '_');
            error_log('###[parseIds]: ID: ' . $id);
            $idArray[$id] = true;
        }
        return $idArray;
    }
}