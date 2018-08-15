## ตั้งค่าฐานข้อมูล
   
`config/config.inc.php`
#### config.inc.php
```php
$host = "localhost";
$user = "root";
$password = "";
$database = "coupon";
$mysqli  = new mysqli($host, $user, $password);
if ($mysqli ) {
    $mysqli ->select_db($database);
  //  echo "ok";
} else {
    echo "please check db config.";
}
```

## นำเข้าฐานข้อมูล
- เข้า `phpmyadmin` เลือก เมนู `import`
- เลื่อกไฟล์ `.sql`
  ![alt text](https://www.picz.in.th/images/2018/08/15/BrR1Y1.png "การ import")


