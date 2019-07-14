# LINE Notify 範例
https://notify-bot.line.me

## 提供函式
````php
  $lineNotify = new lineNotify(CLIENT_ID,CLIENT_SECRET,CALLBACK_URL);
  
  //前往連動頁面取得$_GET["code"]
  $lineNotify->authorization();
  
  //使用剛剛的code取得token
  $lineNotify->getToken($code);
  
  //使用token傳送訊息
  $lineNotify->snedNotify($token);
    
  //解除連動
  $lineNotify->rmToken($token);
````

## 範例畫面
