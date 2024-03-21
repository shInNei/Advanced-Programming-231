<?php
class Hash
{

    public static function makeHash($string)
    {
        return password_hash($string, PASSWORD_DEFAULT);
    }
    public static function unique()
    {
        return self::makeHash(uniqid());
    }
}
