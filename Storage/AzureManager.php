<?php

/**
 * Created by PhpStorm.
 * User: mrren
 * Date: 2017/4/17
 * Time: 上午10:30
 */
namespace Storage;
use WindowsAzure\Common\ServicesBuilder;

class AzureManager
{
    public static $storage_list;
    public static $accountname ;
    public static $accountkey;

    public static function getConfig($config)
    {
        self::$storage_list = $config['storage_list'];
        self::$accountname = $config['accountname'];
        self::$accountkey = $config['accountkey'];
    }

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