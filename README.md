# LINE Notify 範例
https://notify-bot.line.me/doc/en/

### CLIENT_ID、CLIENT_SECRET 申請位置
https://notify-bot.line.me/my/services/new
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
  
  //使用剛剛的code取得token
  $lineNotify->getToken($code);
  
  //傳送訊息
  $lineNotify->snedNotify($token,$data);
  
  //取得調用API限制陣列
  $lineNotify->getApiRateLimit();
    
  //解除連動
  $lineNotify->rmToken($token);
````

## 訊息參數說明

| 參數名稱              | 必填 | 類型      | 描述                                                                                                    |
|----------------------|------|-----------|---------------------------------------------------------------------------------------------------------|
| message              | Y    | String    | 最多 1000 個半/全形字元                                                                                 |
| imageThumbnail       | N    | URL       | 最大尺寸為240×240px JPEG                                                                                |
| imageFullsize        | N    | URL       | 最大尺寸為2048×2048px JPEG<br> imageFullsize 與 imageThumbnail 若有設定其中一個，另外一個參數將變為必填 |
| imageFile            | N    | File Path | 圖片路徑                                                                                                |
| stickerPackageId     | N    | Integer   | 貼圖包ID。[list](https://devdocs.line.me/files/sticker_list.pdf)                                               |
| stickerId            | N    | Integer   | 貼圖ID                                                                                                  |
| notificationDisabled | N    | Boolean   | 是否關閉用戶通知，預設false                                                                             |


## 範例畫面
### 發送畫面
![](https://raw.githubusercontent.com/MTsung/LINE_Notify_PHP/master/image/index.png)

### LINE接收畫面
![](https://raw.githubusercontent.com/MTsung/LINE_Notify_PHP/master/image/line.png)

### License
[MIT license](https://opensource.org/licenses/MIT)
