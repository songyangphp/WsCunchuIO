## 微软云存储SDK

*使用方法*

1.初始化参数(全局有效)


```php
CunChuIO::getConfig(array(
    "storage_list" => '',
    "accountname" => '',
    "accountkey" => '',
    "storename" => '',
    "rongqi" => '',
));
```

2.上传文件

```php
/*
* 云端存储地址
* 要上传至云端的文件二进制内容
*/

CunChuIO::uploadContent("/test/test.jpg","content");
```