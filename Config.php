<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-11
 * Time: 9:40
 */

use Azure\IConfig;
class Config implements IConfig
{

    public function get_StorageList(): array
    {
        return ["ddlestore","wszxstore"];
    }

    public function get_AccountName(): string
    {
        return "wszxstore";
    }

    public function get_AccountKey(): string
    {
        return "LgYWaS8nxag0JVYzCocB+cgUvC2Dg+6g9xfwTSbSmSb13c7EjRTjw+7uz4krW1cWjunWxdhQCeGGplay95/Oyg==";
    }

    public function get_StoreName(): string
    {
        return "wszxstore";
    }

    public function get_Rongqi(): string
    {
        return "zhongcai";
    }
}