<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-11
 * Time: 9:17
 */

namespace storage;


interface IStorageConfig
{
    public function get_StorageList(): array ;

    public function get_AccountName(): string ;

    public function get_AccountKey() : string ;

    public function get_StoreName() : string ;

    public function get_Rongqi() : string ;
}