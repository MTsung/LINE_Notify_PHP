# LINE Notify 範例
https://notify-bot.line.me/doc/en/

### 伺服器環境
* 建議 PHP >= 7.0

## 流程圖
![](https://raw.githubusercontent.com/MTsung/LINE_Notify_PHP/master/image/process%20chart.png)

## 使用方式
````php
  $lineNotify = new lineNotify(CLIENT_ID,CLIENT_SECRET,CALLBACK_URL);
  
  //前往連動頁面取得$_GET["code"]
  $lineNotify->authorization();
  
  //使用剛剛的code取得token
  $lineNotify->getToken($code);
  
  //使用token傳送訊息,不支援imageFile欄位(上傳圖片至line伺服器)
  $lineNotify->snedNotify($token,$data);
  //取得調用API限制陣列
  $lineNotify->apiRateLimit;
    
  //解除連動
  $lineNotify->rmToken($token);
````

## 範例畫面
### 發送畫面
![](https://raw.githubusercontent.com/MTsung/LINE_Notify_PHP/master/image/index.png)

### LINE接收畫面
![](https://raw.githubusercontent.com/MTsung/LINE_Notify_PHP/master/image/line.png)

### License
[MIT license](https://opensource.org/licenses/MIT)
