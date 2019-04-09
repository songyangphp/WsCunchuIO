<?php

/**
 * Created by PhpStorm.
 * User: mrren
 * Date: 2017/4/17
 * Time: 上午10:30
 */
namespace Azure;
use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;

class AzureManager
{
    static $storage_list = array("ddlestore","wszxstore");
    static $accountname = "wszxstore";
    static $accountkey = "LgYWaS8nxag0JVYzCocB+cgUvC2Dg+6g9xfwTSbSmSb13c7EjRTjw+7uz4krW1cWjunWxdhQCeGGplay95/Oyg==";
    public static function getBlobConnectionString($storagename)
    {
        if(!self::isRealStoreage($storagename))
        {
            return false;
        }

        return "BlobEndpoint=http://{$storagename}.blob.core.chinacloudapi.cn/;QueueEndpoint=http://{$storagename}.queue.core.chinacloudapi.cn/;TableEndpoint=http://{$storagename}.table.core.chinacloudapi.cn/;AccountName=" . self::$accountname . ";AccountKey=" . self::$accountkey;

    }
    public static function getBlobRestProxy($storagename)
    {
        if(! ($connectionString = self::getBlobConnectionString($storagename)))
        {
            return null;
        }
        return  ServicesBuilder::getInstance()->createBlobService($connectionString);
    }


    private static function isRealStoreage($storagename)
    {
        return in_array($storagename, self::$storage_list);
    }

}