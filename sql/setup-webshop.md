SQL API för webshop

Vyer
====

## VProducts
Innehåller samlad information om alla produkter i databasen, inklusive vilka kategorier de tillhör samt deras lagerstatus.
För att enkelt få ut information om en produkt rekommenderas SQL-satsen "SELECT * FROM VProducts WHERE ProductNumber = ?;"

## VBaskets
Innehåller samlad information om allt varukorgsinnehåll i databasen, inklusive produktinformation och kund.
Istället för att direkt använda denna vy rekommenderas någon av varukorgsprocedurerna nedan.

## VOrders
Innehåller samlad information om alla ordrar i databasen.
Istället för att direkt använda denna vy rekommenderas någon av orderprocedurerna nedan.



Procedurer
==========

## addProduct
Lägger till en ny produkt i databasen. Används i CRUD-gränssnittet på me-sidan. OBS! Inte en bra lösning, behöver kunna få tag på produkt-id:et istället för att enklare och säkrare kunna lägga in kategori och lagerstatus i databasen.
Argument:
- description   VARCHAR(20)     Beskrivning av produkten
- image         VARCHAR(50)     Bildlänk till produkten
- price         DECIMAL(6,2)    Produktens pris, med två decimaler
- cat_id        INT             Id-nummer på produktens kategori
- items         INT             Antal av produkten som läggs i lager

## updateProduct
Uppdaterar information om en produkt i databasen. Används i CRUD-gränssnittet på me-sidan.
Argument:
- pid           INT             Id-nummer på produkten            
- title         VARCHAR(20)     Beskrivning av produkten
- image         VARCHAR(50)     Bildlänk till produkten
- price         DECIMAL(6,2)    Produktens pris, med två decimaler
- category      INT             Id-nummer på produktens kategori
- inventory     INT             Antal av produkten som läggs i lager

## addToBasket
Kontrollerar om det finns tillräckligt av produkten i lager och lägger sedan till en ny rad i varukorgen med produkten.
Argument:
- basket        INT             Id-nummer för aktuell varukorg
- product       INT             Id-nummer för produkten som läggs till
- amount        INT             Antal av produkten som läggs till

## updateBasketRow
Om kunden uppdaterar mängden av en produkt som redan finns i varukorgen så ska denna procedur anropas. Den kollar först om det finns tillräckligt av produkten i lager. Sedan uppdaterar den mängden i varukorgen. Om den uppdaterade mängden är 0, tas raden bort från varukorgen helt och hållet.
Argument:
- row           INT             Id-nummer för aktuell varukorgsrad
- amount        INT             Den uppdaterade mängden

## removeBasketRow
Tar bort en rad från varukorgen.
Argument:
- basketRow     INT             Id-nummer för aktuell varukorgsrad

## showBasket
Visar allt innehåll i angiven varukorg. Använder vyn VBaskets.
Argument:
- basket        INT             Id-nummer för aktuell varukorg

## checkOut
Bekräftar kundens beställning genom att skapa en ny order, fylla den med de artiklar som finns i varukorgen och till slut ta bort varukorgen. Produkterna flyttas även från lagret i en trigger.
Argument:
- basketid      INT             Id-nummer för aktuell varukorg

## showOrder
Visar allt innehåll i angiven order. Använder vyn VOrders.
Argument:
- order         INT             Id-nummer för aktuell order.

## removeOrder
Kontrollerar först om ordern redan har levererats, i vilket fall ordern inte kan tas bort längre. Annars markeras ordern som borttagen och varorna läggs tillbaka i lagret genom en trigger.
Argument:
- order         INT             Id-nummer för aktuell order

## showRestock
Ger en rapport på vilka produkter som det behöver beställas flera av. Denna rapport fylls på av en trigger som aktiveras när det finns färre än 5 ex av en produkt på lager.

## testAPI
En procedur som kapslar in exempelkod som visar upp databasens API. Vad denna procedur gör är att den lägger till en ny kund och en ny varukorg, vilket görs manuellt då procedurer för detta saknas i denna version. Den visar sedan exempel på följande procedurer, som presenterats ovan: addToBasket, updateBasketRow, removeBasketRow, showBasket, checkOut, showOrder, showRestock, removeOrder.
Kör denna med följande SQL-sats: "CALL testAPI();"
