<?php
class Session
{
    public static function init()
    {
        session_start();
        ob_start();
    }
    public static function destroy()
    {
        session_destroy();
    }
    public static function sessionn($par)
    {
        if ($_SESSION[$par])
        {
            return isset($_SESSION[$par]);
        }
        else
        {
            return false;
        }
    }
    public static function sifrele($par)
    {
        return md5(sha1(sha1(sha1(sha1(md5(md5(md5(sha1(md5(md5(sha1($par))))))))))));
    }
}
