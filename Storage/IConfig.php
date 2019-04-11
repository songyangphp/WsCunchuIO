<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-11
 * Time: 9:17
 */

namespace Storage;


interface IStorageConfig
{
    public function get_StorageList(): array ;

    public function get_AccountName(): string ;

    public function get_AccountKey() : string ;

    public function get_StoreName() : string ;

    public function get_Rongqi() : string ;
}

class StorageApp
{
    private static $config = null;

    public function setConfig(IStorageConfig $config)
    {
        self::$config = $config;
        return $this;
    }


    public function run()
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
        AzureManager::getConfig($return);
    }
}