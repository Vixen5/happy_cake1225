
<form id="formCreditCard" method="post" accept-charset="UTF-8"
 action="https://payment-stage.opay.tw/Cashier/AioCheckOut/V5">

MerchantID 商店代號: 
<input type="text" name="MerchantID" value="2000132" /><br />
MerchantTradeNo 商店交易編號: 
<input type="text" name="MerchantTradeNo" value="DX201912231014032dd5" /><br />
MerchantTradeDate 商店交易時間: 
<input type="text" name="MerchantTradeDate" value="2019/12/23 10:14:03" /><br />
PaymentType 交易類型: 
<input type="text" name="PaymentType" value="aio" /><br />
TotalAmount 交易金額: 
<input type="text" name="TotalAmount" value="5" /><br />
TradeDesc 交易描述: 
<input type="text" name="TradeDesc" value="建立信用卡測試訂單" /><br />
ItemName 商品名稱: 
<input type="text" name="ItemName" value="MacBook 30元X2#iPhone6s 40元X1" /><br />
ReturnURL 付款完成通知回傳網址: 
<input type="text" name="ReturnURL" value="https://developers.opay.tw/AioMock/MerchantReturnUrl" /><br />
ChoosePayment 預設付款方式: 
<input type="text" name="ChoosePayment" value="Credit" /><br />
會員商店代碼: 
<input type="text" name="StoreID" value="" /><br />
ClientBackURL Client端返回廠商網址: 
<input type="text" name="ClientBackURL" value="https://developers.opay.tw/AioMock/MerchantClientBackUrl" /><br />
CreditInstallment 刷卡分期期數: 
<input type="text" name="CreditInstallment" value="" /><br />
InstallmentAmount 使用刷卡分期的付款金額: 
<input type="text" name="InstallmentAmount" value="" /><br />
Redeem 信用卡是否使用紅利折抵: 
<input type="text" name="Redeem" value="" /><br />
CheckMacValue 簽章類型: 
<input type="text" name="EncryptType" value="1" /><br />
CheckMacValue 檢查碼: 
<input type="text" name="CheckMacValue" value="40C8C2FEDF05F842DA58E4F8D1D2ADDDC68475658E34386B0F705A2F0F733D32" /><br />
<input type="submit" value="送出訂單" />

</form>
                                                                        