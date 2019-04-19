<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-13
 * Time: 8:59
 */

namespace storage;


class StorageApp
{
    private static $config = null;

    public function setConfig(IStorageConfig $config)
    {
        self::$config = $config;
        return $this;
    }

    public function init()
    {
        if(self::$config === null){
            exit("CunchuIO need config!");
        }

        $config = new self::$config();
        $return = [
            "storage_list" => $config->get_StorageList(),
            "accountname" => $config->get_AccountName(),
            "accountkey" => $config->get_AccountKey(),
            "storename" => $config->get_StoreName(),
            "rongqi" => $config->get_Rongqi(),
        ];

        foreach ($return as $k => $v){
            if(empty($v)){
                exit("CunchuIO config: ".$k." is null!");
            }
        }

        CunChuIO::getConfig($return);
    }
}