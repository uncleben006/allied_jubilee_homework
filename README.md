## About this project

這是某間公司出的面試作業

測驗說明:
1. 完成後請將專案上傳至GitHub,上傳後能自行架站實際展示尤佳
2. 題目技術要求 (必要):
- 使用Laravel框架執行
- 使用Laravel Service,將其功能模組化
- 使用Laravel Eloquent ORM
- 須自行規劃資料庫,並將DB Schema 與資料一併納入專案根目錄內
- 題目二請使用排程執行,執行週期為每天的每小時

---

題目一:

使用Laravel Auth,撰寫簡易登入與註冊平台

內容描述:

透過資料庫查詢後,若無資料則進行註冊作業。若已有該使用者,則進行資料驗證,查驗該使用者資料是否正確,於正確結果中顯示登入後頁面,若資料不正
確則顯示錯誤結果。

加分題:
串接FB或Google社群網站 (擇一即可) OAuth Login,用於進行會員註冊與登入作業。

---

題目二:

使用Laravel排程,撰寫網路爬蟲並將十二星座資訊儲存至資料庫

內容描述:

請將 http://astro.click108.com.tw/
當日的十二星座資料以爬蟲方式抓取,並在解析後儲存至資料庫內

所需儲存的必要資料如下列
- 當天日期
- 星座名稱
- 整體運勢的評分及說明
- 愛情運勢的評分及說明
- 事業運勢的評分及說明
- 財運運勢的評分及說明

## License

Licensed under the [MIT license](https://opensource.org/licenses/MIT).
