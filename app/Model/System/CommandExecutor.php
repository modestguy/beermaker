<?php
namespace App\Model\System;

class CommandExecutor {

    private static function passFile() : string
    {
        return config_path('sudo.txt');;
    }

    public static function exec(string $command)
    {
        exec('sudo -u root -S ' . $command . ' < ' . self::passFile(), $output);
        return $output;
    }
}
