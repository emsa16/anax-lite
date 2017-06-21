<h1>Redovisningstexter</h1>

<h2>Kursmoment 01</h2>
<h3>Allmänna reflektioner:</h3>
<p>
    Det här var ett massivt första moment. Jag upplever att här fanns tillräckligt med material för två kursmoment, i alla fall tog det mig ungefär så mycket tid att komma igenom allt. Det blev lite överväldigande när momentet omfattade såväl oop som ramverk och även lite sql. Jag tycker att man borde ha prioriterat lite och fokuserat på två av dessa delar och inte alla tre.
</p>
<p>
    Trots att kursmomentet var massivt så saknade jag läsanvisningar. Jag kikade på ett par kommande kursmoment och märkte att det var skralt med ordentliga läsanvisningar även framöver, vilket jag tycker är synd. Jag har uppskattat kursböckerna vi haft tidigare och har lärt mig mycket av dem, eftersom de ofta förklarar ämnena lite annorlunda än skolans artiklar. Finns det verkligen så dåligt med kursböcker om oop i PHP eller vad är orsaken bakom detta?
</p>
<p>
    Det gick också åt tid att tolka några av uppgifterna som var lite otydligt formulerade, närmare bestämt Gissa numret- och navbar-uppgifterna. Gissa numret-uppgiften krävde ganska många genomläsningar för att förstå alla kraven och en del var tolkningsbart. Det finns till exempel en mening i reglerna som lyder "Klassen skall innehålla en metod som gör en gissning" och på skärmbilderna finns det en randomize-knapp. Detta kan tolkas som att Guess-klassen ska göra en automatisk slumpmässig gissning, eller att klassen ska hantera användarens gissning. Jag ser inte vad det förra fallet skulle bevisa så jag implementerade endast det senare fallet. Det är en sak om uppgifterna är öppna och ger utrymme för oss att skapa våra egna implementeringar, men i dessa fall fanns det instruktioner men de var otydliga.
</p>

<h3>Hur känns det att hoppa rakt in i klasser med PHP, gick det bra?</h3>
<p>
    Vi har ju farten uppe från oopython-kursen så det gick ganska smidigt att flytta över tänket till PHP-språket. Att leta i referensmanualen för PHP går också väldigt bra numera, tidigare har jag funnit den lite otymplig. Jag förstår att den här kursen ska utmana oss lite mera och att vi ska få leta efter informationen vi behöver lite mer på egen hand. Till exempel så förklaras aldrig vad namespace är för något, bara att man ska använda det, så det fick jag kolla upp själv. Detta är inget problem men jag önskar att man kunde ha nämnt kursstrategin inledningsvis (jag hoppas att det är ett medvetet val och inte missar i materialet).
</p>
<p>
    Jag har länkat till Guess-spelet från about-sidan i min me-sida.
</p>

<h3>Berätta om dina reflektioner kring ramverk, anax-lite och din me-sida.</h3>
<p>
    Det var mycket lärorikt att lära sig skapa ett "eget" ramverk, jag fick en mycket bättre förståelse för vilka olika delar som behövs för att få ett ramverk att fungera. Nu var det ju väldigt mycket som vi bara laddade ner och satte in så det finns en känsla av att jag inte har full kontroll över koden som styr min sida. Dock var ingen av delarna oöverkomligt stora och jag skummade igenom det som laddades ned så jag i alla fall hade ett hum om vad modulerna innehöll. Så i detta skede känner jag att jag en ganska god förståelse för ramverkets fördelar och begränsningar. Nu gör jag ju denna kurs parallellt med design-kursen så jag vet inte riktigt allt vad anax-flat innehåller och vissa element som CImage får jag hoppa över.
</p>

<h3>Gick det bra att komma igång med MySQL, har du liknande erfarenheter sedan tidigare?</h3>
<p>
    Det är första gången jag använder MySQL men i tidigare kurser (oopython, htmlphp) har SQL introducerats genom SQLite, så egentligen var det ju inget nytt i sig. Jag har svårt att se skillnaderna mellan SQLite och MySQL/MariaDB, det enda jag kan se just nu är att databasen inte existerar som fil på min dator i MySQL, utan jag antar att den ligger på MySQL-servern jag dragit igång via XAMPP. Det var en hel del att gå igenom även i SQL-biten. Först var det installationen och de olika MySQL-klienterna och även hur man använder MySQL på studentservern. Sedan var det SQL-uppgiften, som verkligen var massiv så det var tur att den var uppdelad i tre delar. Jag hade lagt så mycket tid på kursmomentet hittills så jag gjorde endast avsnitt 1-6 av uppgiften. Av det var det mesta bekant från tidigare men kommandot ALTER var intressant och väldigt praktiskt. Jag tyckte ganska mycket om MySQL CLU men använder ändå Workbench i uppgiften.
</p>

<h2>Kursmoment 02</h2>
<h3>Allmänna reflektioner:</h3>
<p>
    Detta kursmoment var mer rimligt i omfattning än det första. Artiklarna och uppgifterna hängde bra ihop med varandra och gav mig ytterligare förståelse för hur ramverket fungerar, framförallt med frontkontrollern och config-filen samt hur modulerna fungerar och sätts in i ramverket. Det finns en artikel här om att skapa en Session-klass, något som vi redan gjort i första kursmomentet. Kan det vara så att artiklar och uppgifter flyttats runt bland kursmomenten utan att detta märkts? Det är annars en väldigt märklig ordning att lägga materialet i. Sedan måste jag nog kritisera att de enda läsanvisningarna i detta moment är "extra läsning i referenslitteraturen efter eget val", då det känns väldigt slappt. Orsaken till att jag valt att lära mig programmering via en skola är att jag litar på att lärarna är kompetenta och erfarna och att de valt ut bästa tillgängliga material för oss att läsa.
</p>

<h3>Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?</h3>
<p>
    Jag tycker att det är ett väldigt bra sätt att arbeta på att skapa separata koddelar som som när de är klara läggs in i ramverket som en modul. Jag tycker att en modulär struktur är väldigt praktisk och ser egentligen bara fördelar med det. Det är klart att om webbplatsen man bygger ska vara väldigt enkel så kanske det går snabbare och enklare att bara skapa en enkel sida och strunta helt i ramverk och moduler. Utmaningen jag ser framför mig är att undvika att göra de klasser/moduler jag skapar beroende av andra moduler så långt det går. I navbar-klassen så måste jag injecta app-objektet med setApp() för att kunna använda url- och request-modulerna, vilket gör den beroende av dessa moduler, men i just fallet med navbar så kändes det ofrånkomligt.
</p>

<h3>Hur väljer du att organisera dina vyer?</h3>
<p>
    Jag har lagt alla vy-filer som jag använder på min me-sida i mappen view/take1, förutom navbaren som ligger i den egna mappen view/navbar2. Varje route som ska visa upp en html-sida (i motsats till t.ex. ett JSON-svar) plockar in header-, navbar- och footer-filerna från view-mappen. Beroende på routen så läggs olika vyer till som body på sidan. Det är alltså samma struktur som tidigare, jag har valt att inte använda en layout-fil med regioner eller renderView()-metoden då jag inte riktigt kände behovet att omorganisera sidan. Min router känns i dagsläget funktionsduglig och tillräcklig som den är, att lägga till vyer där och sedan rendera är enkelt och tydligt nog. Det jag skulle kunna vinna på med att skapa en layout är att jag blir av med navbaren från view-mappen. I nuläget så innehåller navbar2/navbar.php bara ett anrop till metoden $app->navbar->getHTML() och en sluttagg för headern, för att html-koden ska bli korrekt. Kanske kunde en layout fixa till detta.
</p>

<h3>Berätta om hur du löste integreringen av klassen Session.</h3>
<p>
    Efter att läst igenom artikeln om vilka alternativ man har när man ska integrera en klass/tjänst/modul i ramverket så löste jag denna uppgift på det sätt som kändes spontanast och mest rakt på sak. Sessionsklassen lades in som en del av $app-objektet i frontkontrollern. Någon config-fil fanns det inte behov för och klassen är inte beroende av andra klasser heller så sedan var det bara att börja använda den. Alla anrop till sessionsobjektet sker i routern vilket gör vyn väldigt ren. I själva verket är det bara två router som använder vyn, huvudsidan för session och dump-sidan. Alla router börjar med att starta upp sessionen och beroende på routen manipuleras sessionen på olika sätt. För att få bättre kontroll på när information skrivs ut så gjorde jag om dump()-metoden i Session() så att den returnerar ett print_r()-värde så att jag kan skicka vidare det till vyn innan det skrivs ut på sidan.
</p>

<h3>Berätta om hur du löste uppgiften med Tärningsspelet 100/Månadskalendern, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?</h3>
<p>
    Jag valde att göra månadskalendern eftersom den skiljer sig mer från tidigare uppgifter vi gjort, spelet påminde om spel vi gjort innan. Jag började med att studera alla de inbyggda funktioner och klasser som finns i PHP. Jag fastnade till sist för att använda getdate() i kombination med mktime() och extract() för att få ut variabler om månad, veckodag och datum som jag sedan sparar i klasserna. Jag har skapat fyra klasser, Calendar, Year, Month och Day. Frontkontrollern behöver bara läsa in Calendar-klassen, som i sin konstruktor använder Year-klassen, som i sin tur använder Month-klassen som i sin tur använder Day-klassen. På detta sätt har jag skapat kompositionsförhållanden mellan klasserna som känns naturliga. När Calendar() instantieras så skapas ett antal Year-objekt och för varje Year-objekt skapas 12 Month-objekt. I konstruktorn för Month så används mktime och getdate för att få ut månadens namn. Sökvägen till bilden för månaden ifråga skapas också i Month-konstruktorn. En annan inbyggd funktion som jag använde här är cal_days_in_month() som ger mig antal dagar i den månaden. Med hjälp av den informationen kan jag sedan skapa alla Day-objekten för den månaden. I konstrukturn för Day-klassen hämtas och sparas information om dagens datum och veckodagsnamn och -nummer. Där läggs även till information om dagen är den första i veckan eller om det är en röd dag.
</p>
<p>
    Alla medlemsvariabler är privata och jag har därför skapat metoder i alla klasser för att hämta ut information om objektet. Något annat innehåller inte klasserna Year, Month och Day, så de är väldigt enkla men det finns goda möjligheter att bygga på funktionalitet i framtiden, som exempelvis att kunna skriva in meddelanden på en viss dag. Det är i metoden Calendar::getMonthCal som kalendervyn skapas. Den tar år och månad som parametrar, denna information lagrar jag i sessionen. Jag blir också tvungen att injecta metoden url->asset() till getMonthCal för att kunna skapa länken till kalenderbilden korrekt. Denna lösning känns inte klockren och skulle jag jobba vidare så skulle jag försöka göra om detta på ett snyggare sätt. Jag använder sedan en foreach-loop för att lägga in dagarna i en tabell. Om tabellen behöver fyllas ut i början eller slutet med dagar från andra månader så sköts även detta inuti loopen. Med metoden getOtherMonth hämtas intilliggande månad och metoden kontrollerar om både år och månad behöver bytas. Om dagen är den första i veckan så skapas en ny rad i tabellen. Om dagen är röd får dagen css-klassen 'red-day'.
</p>
<p>
    Bläddringen i kalendern sköts genom länkar till routerna kalender/next och kalender/previous. I dessa router hämtas värdena på månad och år från sessionen och justeras med Calendar-metoderna getPrevious och getNext, som i sin tur använder sig av tidigare nämnda getOtherMonth. Routerna redirectar därefter till routen kalender.
</p>

<h3>Några tankar kring SQL så här långt?</h3>
<p>
    Jämfört med tidigare dbwebb-kurser så börjar vi nu gå in lite mer på djupet med SQL och det känns hela tiden intressantare när jag inser hur kraftfullt SQL-språket är. Jag gjorde del 7-11 i detta kursmoment och bland de uppgifterna var vyerna det mest givande. Jag ser genast hur väldigt användbart vyer kan vara om det man arbetar med är lite mer krångligt. Jag gissar att detta inte var möjligt i SQLite och börjar se hur det kan vara begränsande. Group by var lite svårt att greppa precis hur det fungerade, så jag testade lite olika satser med och utan group by-kommandot. Det känns nästan magiskt hur den organiserar informationen fastän det ju är fullt logiskt och enkelt egentligen.
</p>


<h2>Kursmoment 03</h2>

<h3>Allmänna reflektioner</h3>
<p>
    Uppgifterna tog sin goda stund att bli klara med och jag blev tvungen att prioritera hårt vad jag skulle hinna göra, så jag är inte särskilt nöjd med mina lösningar på uppgifterna. Allting fungerar men det ser inte snyggt ut, varken i webbläsaren eller i koden. Det ligger mycket kod i routerna och där kunde jag göra bättre lösningar med att lyfta ut kod till en klass om jag hade tid. Login- och admin-sidorna flöder inte helt konsekvent och felmeddelanden som att man slagit in fel lösenord dumpas ut väldigt fult just nu. Min me-sida är också utseendemässigt väldigt enkel, men jag tycker samtidigt inte att detta känns prioriterat i kursen som är väldigt fokuserad på det tekniska.
</p>

<h3>Hur kändes det att jobba med PHP PDO, SQL och MySQL?</h3>
<p>
    Vi har ju använt oss av PDO tidigare i htmlphp-kursen, men jag har fått en större förståelse för den nu i denna kurs, speciellt när vi använder MySQL istället för SQLite. Det är bekvämt att ha ett interface som fungerar på samma sätt även om databasen är en annan. Ytterligare bekvämlighet får man när man lägger allting i klasser. När man vet att man har en stabil klass med enkla och tydliga metoder är det smidigt att jobba mot databasen i sina andra filer. I artikeln "Kom igång med SQL" så har vi fått prova på kommandon och trick i SQL som jag innan aldrig hade insett ens var möjliga. Det som sticker ut mest är hur man kan använda vyer och join-satser för att kunna modellera sin data och databas. Även om jag bävar lite inför det så ser jag framemot konkreta uppgifter längre fram i kursen där vi får använda dessa grejer i praktiken. Fortfarande är jag inte säker på vilka grejer som är möjliga även i SQLite och vilka som är specifikt MySQL, men gissar att SQLite är begränsad vad gäller de mer avancerade kommandona vi använt.
</p>
<p>
    Jag har nu gjort de sista avsnitten i SQL-artikeln, del 12-15. I min sql-fil har jag kommenterat bort select-satserna för det blev så många att MySQL Workbench blev opraktiskt att använda.
</p>

<h3>Reflektera kring koden du skrev för att lösa uppgifterna, klasser, formulär, integration Anax Lite?</h3>
<p>
    Jag började med att göra om Database-klassen lite grann så att den matchade andra moduler bättre, genom att lägga till ConfigureInterface och ha config-koden i sin egen fil i config-mappen. Connect-klassen från exemplet gjorde jag om till UserDatabase, en subklass till Database, med metoder specifika för min tabell med användarinformation. Jag formade min lokala databas så att miljön var likadan som på studentservern. En stund försökte jag hitta en konfiguration som skulle fungera såväl lokalt som på studentservern, men jag kunde inte lösa det då det krävs olika hosts i dsn-variabeln. Till slut landade jag på en associativ array i config-filen, som mappar värdet på $_SERVER["HTTP_HOST"] mot motsvarande databashost. För att undvika att lösenordet till studentdatabasen hamnar på GitHub så har jag lagt till config/database.php och setup-user.sql i min .gitignore. I repot finns istället default-filer som fungerar som exempel men måste modifieras för att kunna användas på riktigt.
</p>
<p>
    Jag har verkligen blivit tvungen att hålla det enkelt och grovhackat för att uppgifterna tagit lång tid att utföra och det har varit en del problem på vägen. Jag hade stora problem med input_parameters till prepared statements. Problemet var att pagineringen av användartabellen krävde värden på LIMIT och OFFSET men när jag gör PDOStatement::execute på mitt SQL-kommando så omvandlar mina integer-parametrar till strängar. Jag läste mig fram till det beror på att default-hanteringen i PDOStatement::execute av input_parameters är PDO::PARAM_STR. Jag gjorde då om i min databas-klass så att varje input_parameter läggs in i mitt statement med bindValue istället och för varje parameter kollas värdetypen så att det blir rätt. Då gick den delen äntligen igenom. Då visade det sig däremot att ASC/DESC inte går att lägga in som en input_parameter och då insåg jag till slut att jag måste gå tillbaka hur SQL-satsen ursprungligen hanteras i exemplet, med att lägga in variablerna direkt i den såhär: "SELECT * FROM me_users WHERE name LIKE ? ORDER BY $orderBy $order LIMIT $limit OFFSET $offset". Detta känns inte lika säkert men koden innehåller ju kontroller av variablerna innan så det fick bli såhär. Ett annat problem som uppstod var när jag namespacade mina databas-klasser, för då hittade inte systemet längre PDO och Exception-klasserna som finns därinne. Med lite trial & error fick jag det löst genom att benämna dem \PDO och \Exception.
</p>
<p>
    Jag har lagt inloggningslänken i headern ovanför navbaren och när man är inloggad syns där istället namnet på den som är inloggad, och klickar man på namnet så tas man till användarprofilen. Användarna är så enkla som det bara är möjligt, de har endast ett användarnamn, lösenord och behörighetsnivå. Det enda en användare kan göra på sin profil nu är att ändra lösenord och de kan inte se sin behörighetsnivå. Admin-sidan nås via en länk i footern och den routen är endast nåbar om man är inloggad med admin-behörighet. Admin kan ändra användarens namn och lösenord och lägga till och ta bort användare. Lösenorden syns i klartext för admin men behöver inte dubbelinmatas i motsats till gränssnittet för en vanlig användare. Admin kan se behörighetsnivåerna på användare men inte ändra behörighetsnivåer i nuvarande version. Admin kan inte heller radera sitt eget konto för att undvika en situation utan administratörskonton. Jag förstod inte syftet med krav 1 i admin-uppgiften att man ska skapa en setup-user-admin.sql. Var det meningen att admins skulle in i en egen tabell? Jag försökte kolla på hur andra tolkat det i deras repon men blev inte klokare av det så jag har hoppat över det. Alla användar- och adminkonton ligger i tabellen me_users och kolumnen "level" avgör om de är admin eller vanliga användare. admin / admin har admin-behörighet och doe / doe har vanlig användarbehörighet.
</p>

<h3>Känner du dig hemma i ramverket, dess komponenter och struktur?</h3>
<p>
    Överraskande lätt har jag tagit till mig hur ramverket fungerar och hur jag passar in nya delar och moduler i den. Speciellt lärorikt är när vi har fått i uppgift att lägga in klasser och liknande som inte är färdigt formade lego-bitar som man bara lägger in i ramverket, utan vi behöver skapa config-filer och anpassa klasserna själva för att få till det så att det fungerar väl inuti ramverket. Jag använder kanske inte alla modulerna, speciellt de som jag inte byggt själv utan bara dragit ner med composer, så mycket som jag kunde. Emellanåt tittar jag i dessa moduler om jag behöver förstå vad en viss metod gör under huven men för att verkligen ha full kontroll över ramverket så behöver jag studera dem ännu närmare.
</p>

<h3>Hur bedömmer du svårighetsgraden på kursens inledande kursmoment, känner du att du lär dig något/bra saker?</h3>
<p>
    Det har varit tjockt med nya saker att lära sig de tre första momenten. Allting har känts väldigt relevant och mycket nyttigt att lära sig. Speciellt inloggningen och admin-gränssnittet detta kursmoment är viktiga verktyg att ha med sig i framtiden. OOP-delen har känts väldigt integrerad i arbetet och jag tycker verkligen att jag förstått hur användbart det är när man bygger hemsidor med ramverk på detta sätt. När jag tittar igenom anax-lite-katalogen så finner jag det anmärkningsvärt hur omfattande den redan blivit och att jag ändå vet vad varje del gör och att den behövs för att sidan ska fungera. Det har varit lagom utmanande hela tiden, men storleken på uppgifterna har varit väldigt utmanande. Jag har inte kunnat göra allting så ordentligt som jag önskat och det finns hela tiden mycket jag skulle vilja fixa till, framförallt bli konsekvent med vilken kod som ska ligga i vyerna, vilken i routerna och vilken någon annanstans.
</p>

<h2>Kursmoment 04</h2>

<h3>Allmänna reflektioner:</h3>
<p>
    Spännande att ta sig an en egen bloggplattform. Jag fann det också lärorikt att jobba med att lagra webbsideinnehåll i databasen. Vi har ju jobbat med att hämta innehåll från en databas i htmlphp-projektet så detta är ju det naturliga nästa steget. Det som jag fortsätter att gilla så mycket i dessa studier är att man gör så konkreta framsteg och varje vecka lär man sig något som man inte hade en aning om veckan innan. Det motiverar mig starkt att se min egen utveckling så klart.
</p>

<h3>Finns något att säga kring din klass för texfilter, eller rent allmänt om formattering och filtrering av text som sparas i databasen av användaren?</h3>
<p>
    Jag valde medvetet att titta så lite som möjligt på CTextFilter när jag skapade min egen klass för samma ändamål. I klassen har jag den associativa arrayen callbacks som har filter-namnen som nycklar och motsvarande metodnamn i strängformat som värden. Sedan har jag min format-metod som är den enda metod man behöver använda utifrån (jag blev ändå tvungen att ändra mina andra metoder från private till public pga att phpmd klagade på att metoderna inte användes, pga det sätt jag strukturerat klassen). I format-metoden så körs texten igenom alla ombedda filter en i taget genom call_user_func. Jag valde att implementera även strip_tags och htmlspecialchars i denna klass och använder speciellt den senare flitigt i alla formulär och liknande. Det är en ganska enkel men bra klass som fungerar som den ska.
</p>
<p>
    En testsida för att visa upp hur de olika formateringsfiltren fungerar finns i menyn under 'Filtertest' (anax-lite/htdocs/filter). För allt innehåll som sparas i databasen så har jag valt att inte köra strip_tags på innehållet, i och med att man kanske skriver om html i exempelvis en bloggpost och vill beskriva en tagg och den informationen skulle isåfall försvinna. Istället gör jag så med varje webbsida jag hämtar från databasen att jag först filtrerar den genom htmlspecialchars och därefter formaterar den enligt de filter som är aktuella för den. På det sättet visas innehållet säkert och på snyggast möjliga sätt.
</p>

<h3>Berätta hur du tänkte när du strukturerade klasserna och databasen för webbsidor och bloggposter?</h3>
<p>
    Jag har lagt all funktionalitet jag behövde för denna uppgift i klassen Content. Det är en lång rad metoder som i huvudsak endast innehåller en sql-sats och ett anrop till databas-modulen. Där finns även några metoder för att felhantera tomma paths och likadana slugs. Lösningen för den sistnämnda är jag ganska nöjd med, där är det huvudsakligen metoden checkDuplicateSlugs som rekursivt granskar alla slugs och tar fram en slug som är unik. Det är inte den mest optimala lösningen att ha alla metoder i samma klass men det fungerar så det får duga för stunden. Databasen ser i grunden likadan ut som i exempelartikeln. Jag har lagt till några vyer i databasen för att underlätta hanteringen av sidor, bloggposter och block.
</p>

<h3>Förklara vilka routes som används för att demonstrera funktionaliteten för webbsidor och blogg (så att en utomstående kan testa).</h3>
<p>
    Allting jag gjort i uppgiften 'Bygg webbsidor från innehåll i databasen' är samlat under menyvalet Content (anax-lite/htdocs/content/). Där finns en lista med länkar till olika undersidor vilka jag alla tänker beskriva härnäst. Alla länkar förutom admin-sidan går att nå utan att man är inloggad på sidan. Sidor (anax-lite/htdocs/content/pages) leder til en lista av sidor som är lagrade på databasen. Dessa är som normala webbsidor. Listan här visar endast de sidor som är publicerade och inte är raderade. Blogg (anax-lite/htdocs/content/blog) leder till en översikt över de bloggposter som finns i databasen. Även här syns endast publicerade och icke-raderade inlägg i denna vy. Exempelsida för block (anax-lite/htdocs/content/block) visar exempel på block som lagras i databasen, för tillfället en flash-region och en sidoruta. Strukturen för att åstadkomma detta är att jag i routen skapar arrayen 'blocks' som jag fyller med block vyn behöver och hämtar blocken med en metod i min Content-klass. Blocken filterformateras på samma sätt som sidor och bloggposter och skickas sedan till vyn. Slutligen finns admin-sidan (anax-lite/htdocs/content/admin), som kräver att man är inloggad antingen som doe eller admin. Den fulla översikten av alla sidor, bloggposter och block finns endast på admin-sidan. Därifrån kan man göra CRUD-kommandon och även återställa content-tabellen i databasen.
</p>

<h3>Hur känns det att dokumentera databasen så här i efterhand?</h3>
<p>
    Än så länge är databasen som är kopplad till me-sidan väldigt anspråkslös och att visualisera den ger inte så mycket. Men jag tycker ändå att det är bra att påbörja detta redan nu, för i takt med att databasen växer så är det viktigt att ha en god överblick. Uppgiften gav också en insikt om att databasen är en helhet, de två tabellerna som finns där än så länge kändes under uppgiftens gång som helt skilda entiteter men de hör ju ändå till samma databas. Genom att vi läste artikeln om en kokbok för databasmodellering så ser jag tydligt nyttan av att dokumentera skriftligt och visuellt sin databas under utvecklingens gång, för att veta vad det är man håller på med och vart man är på väg.
</p>

<h3>Om du är självkritisk till koden du skriver i Anax Lite, ser du förbättringspotential och möjligheter till alternativ struktur av din kod?</h3>
<p>
    Jag är tvungen att göra jobbiga beslut hela tiden att inte gå in och 'refactor' min kod, eftersom jag måste gå vidare till nästa uppgift. Just nu kan jag se flera möjlighet att rensa upp min kod ordentligt, speciellt i routerna. Jag behöver också tänka igenom hur jag vill ha mina klasser egentligen och om alla metoder egentligen ligger i den mest lämpade klassen. Speciellt körigt är det med min databaskoppling. Jag har en Database-klass och en subklass UserDatabase. Detta var logiskt när jag bara hade den tabellen men nu kom content-tabellen också in. Det är givetvis inte en bra idé att göra den till en subklass av Database, eftersom den klass som jag instansierar som en del av app-objektet är subklassen UserDatabase. Den har ju basklassens innehåll med sig, men det ställde till det för mig när jag nu ville ha kommandon för en annan tabell också. Lösningen blev väldigt ful, trots att den fungerar, så det är nog där jag skulle börja reda upp om jag fick möjlighet till det.
</p>

<h2>Kursmoment 05</h2>

<h3>Gick det bra att komma igång med det vi kallar programmering av databas, med transaktioner, lagrade procedurer, triggers, funktioner?</h3>
<p>
    Nu börjar det hända grejer i databasen! Alla nya koncept som introducerades här kändes direkt applicerbara i arbetet med databasen. De var också ganska enkla att ta till sig, speciellt procedurer och funktioner är ju gamla bekanta programmeringskoncept. Transaktioner är ett väldigt enkelt men ovärderligt tillägg när databasen blir mer komplex och kräver justeringar i flera tabeller samtidigt. Det tog ett tag för mig att förstå skillnaden mellan lagrade procedurer och egendefinierade funktioner, och artiklarna förklarade inte detta direkt. Lagrade procedurer förstod jag egentligen direkt men varför man dessutom behövde funktioner begrep jag ej. Däremot hade kursboken i PHP en bra förklaring och efter att surfat runt lite mer på ämnet så började jag förstå skillnaden. Funktionerna behöver man egentligen först när innehållet i databasen behöver bearbetas på något sätt, framförallt om något ska beräknas.
</p>

<h3>Hur är din syn på att programmera på detta viset i databasen?</h3>
<p>
    Jag tycker om att kunna separera SQL-koden från mina PHP-dokument ganska långt, det blir renare att ha SQL-kommandon i lagrade procedurer i min SQL-setup-fil. I PHP-koden behöver jag då bara skriva in väldigt enkla SQL-kommandon och om jag skapar ett API som i uppgiften så räcker det egentligen med olika "CALL procedure();"-kommandon. Med detta sagt så har jag ändå uppskattat att SQL inte innehåller alltför mycket logik utan är en ganska ren datalagrare. Men med viss måtta så tror jag att programmering i databasen kan förbättra användningsmöjligheterna stort.
</p>

<h3>Några reflektioner kring din kod för backenden till webbshopen?</h3>
<p>
    Jag utgick ifrån webshop-exemplet från föreläsningen och kastade ut sådant som inte kändes relevant för uppgiften. Grunden kändes ändå stabil och jag är nöjd med mina tillägg och nuvarande struktur i databasen. Det finns ett par detaljer som inte är helt stabila dock. När man lägger till en ny produkt så finns det en lagrad procedur för detta, men den vet inte om vilket id-nummer den nyskapade produkten har, vilket öppnar för eventuella problem om det skulle finnas väldigt snarlika produkter i produkt-tabellen. Jag kunde inte hitta en lösning på detta än så länge. En annan sak som jag definitivt behöver lösa om jag tar koden vidare, är att om en produkt raderas från databasen, så försvinner den även från eventuella sparade ordrar, eftersom de båda tabellerna är sammankopplade. Detta leder till inkonsekvens, för om en order existerar så har produkten redan tagits från lagret så man ska inte behöva ändra i ordern även om produkten tas bort ur databasen. Jag har än så länge bara lagt en varning på backend-sidan om det, men en lösning vore att lägga till en "deleted"-kolumn i produkt-tabellen, så att produkterna aldrig tas bort permanent, vilket bevarar konsistensen i databasen.
</p>
<p>
    Det tog ett bra tag innan jag kunde finna användning för egendefinierade funktioner. Det är ju knappt nåt som behöver beräknas i den nuvarande databasen. Till slut hittade jag ändå nåt och jag lade även till två funktioner som används för att kontrollera statusen på vissa element i databasen och skickar tillbaka bool-värden. Funktionerna används endast inuti mina lagrade procedurer och jag upplever inte att de ska dokumenteras som en del av API:t, utan de är mer en del av det interna, tillsammans med triggers.
</p>
<p>
    Uppgiften i sig verkade först inte så krånglig, men när grundstrukturen började vara på plats så uppstod behov av väldigt mycket småjusteringar. Hela tiden kommer man på nya regler som man måste fixa till för att inte databasen ska kunna gå sönder om man ändrar eller tar bort något ur en tabell. Till slut måste jag börja prioritera ordentligt för ju närmare slutet jag trodde jag kom desto mer problem dök det upp, specialsituationer som kunde ställa till det i databasen. Speciellt krångligt blev det när jag lade in CRUD-gränssnittet på me-sidan för i och med det introducerades nya funktioner som kunde ställa till det i andra tabeller. Jag har åtgärdat de allvarligaste bristerna, men det finns fortfarande små förbättringar som kunde göras, vilket jag delvis beskrivit ovan.
</p>

<h3>Något du vill säga om koden generellt i och kring Anax Lite?</h3>
<p>
    Jag har inte haft tid att gå in och putsa i ramverkskoden utan fokuserat helt på databasen. Det finns dock många förbättringsmöjligheter märker jag, speciellt när man lägger till nya sidor hela tiden. Nu finns det ett flertal snarlika klasser för att kommunicera med databasen och även många snarlika vyer, som eventuellt kunde gå att föra samman. I och med phpdoc-uppgiften så insåg jag att jag inte dokumenterat mina klasser särskilt bra alls, så det verktyget är hjälpsamt i och med att denna listar alla dokumentationsblock som saknas i filerna.
</p>


<h2>Kursmoment 06</h2>
<p>
    Redovisningstext...
</p>

<h2>Kursmoment 07/10</h2>
<p>
    Redovisningstext...
</p>
