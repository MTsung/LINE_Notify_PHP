# LINE Notify 範例
https://notify-bot.line.me/doc/en/

### CLIENT_ID、CLIENT_SECRET 申請方式
1. 到 https://notify-bot.line.me/my/services/new 填寫資料

![](https://raw.githubusercontent.com/MTsung/LINE_Notify_PHP/master/image/step1.png)

2. email認證成功後就有 CLIENT_ID、CLIENT_SECRET 了
![](https://raw.githubusercontent.com/MTsung/LINE_Notify_PHP/master/image/step2.png)

3. 至 config.php 設定 CLIENT_ID、CLIENT_SECRET、CALLBACK_URL
```php
  define("CLIENT_ID","你的CLIENT_ID");
  define("CLIENT_SECRET","你的CLIENT_SECRET");
  define("CALLBACK_URL","你的callback.php網址");
```

### 伺服器環境
* 建議 PHP >= 7.0

## 流程圖
![](https://raw.githubusercontent.com/MTsung/LINE_Notify_PHP/master/image/process%20chart.png)

## 使用方式
````php
  include_once("class/lineNotify.class.php");
  $lineNotify = new lineNotify(CLIENT_ID,CLIENT_SECRET,CALLBACK_URL);
  
  //前往連動頁面取得$_GET["code"]
  $lineNotify->authorization();
  
  $code = $_GET["code"];

  //使用剛剛的code取得token
  $token = $lineNotify->getToken($code);
  
  //傳送訊息
  $data = [
    "message" => "\n130 kps | FC 40.44☆ Black + White (97.96%) 882,699 | osu!mania | 10k vibro\nhttps://youtu.be/OHBEDNisKnc",
    "imageThumbnail" => "https://i.ytimg.com/vi/OHBEDNisKnc/hqdefault.jpg",
    "imageFullsize" => "https://i.ytimg.com/vi/OHBEDNisKnc/maxresdefault.jpg",
    "imageFile" => "image/index.png",
    "stickerPackageId" => 1,
    "stickerId" => 1,
    "notificationDisabled" => false
  ];
  $lineNotify->snedNotify($token,$data);
  
  //取得調用API限制陣列
  $apiRateLimit = $lineNotify->getApiRateLimit();
    
  //解除連動
  $lineNotify->rmToken($token);
````

## 訊息參數說明

| 參數名稱              | 必填 | 類型      | 描述                                                                                                    |
|----------------------|------|-----------|---------------------------------------------------------------------------------------------------------|
| message              | Y    | String    | 最多 1000 個半/全形字元，多餘的系統會用...代替                                                                                  |
| imageThumbnail       | N    | URL       | 最大尺寸為240×240px JPEG                                                                                |
| imageFullsize        | N    | URL       | 最大尺寸為2048×2048px JPEG<br> imageFullsize 與 imageThumbnail 若有設定其中一個，另外一個參數將變為必填     |
| imageFile            | N    | File Path | 圖片路徑，該參數優先權比imageFullsize、imageThumbnail高                                                    |
| stickerPackageId     | N    | Integer   | 貼圖包ID。[list](https://devdocs.line.me/files/sticker_list.pdf)                                         |
| stickerId            | N    | Integer   | 貼圖ID                                                                                                  |
| notificationDisabled | N    | Boolean   | 是否關閉用戶通知，預設false                                                                               |


## 範例畫面
### 發送畫面
![](https://raw.githubusercontent.com/MTsung/LINE_Notify_PHP/master/image/index.png)

### LINE接收畫面
![](https://raw.githubusercontent.com/MTsung/LINE_Notify_PHP/master/image/line.png)

### License
[MIT license](https://opensource.org/licenses/MIT)
