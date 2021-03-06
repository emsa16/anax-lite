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

<h3>Var du bekant med begreppet index i databaser sedan tidigare?</h3>
<p>
    Jag kände inte till begreppet index som sådant i sammanhanget databaser, men jag har använt vissa element av det tidigare, närmare bestämt primary keys, foreign keys och unique-attribut, som alla hjälper till att optimera databasen, vilket ju är syftet med index. Än så länge har jag ju endast jobbat med ganska små databaser på min me-sida, så ibland är det svårt att kunna se var det finns flaskhalsar i databasen och att kunna urskilja om indexet gör någon skillnad, men jag förstår i alla fall principen bakom och nyttan med dem.
</p>

<h3>Berätta om hur du jobbade i uppgiften om index och vilka du valde att lägga till och skillnaden före/efter.</h3>
<p>
    Jag lade ganska mycket tid på att leta efter saker som kunde optimeras i mina nuvarande sql-satser, men insåg till sist att den befintliga strukturen redan var ganska optimerad med primary keys och unique-attribut från tidigare, så mina existerande sql-kommandon var redan nästan så optimerade som de kunde vara. Jag skapade därför två index för min webshop som inte används i nuvarande implementering men kan tänkas komma väl till pass i framtida versioner där man har en sökfunktion i webshopen. Indexet 'product_name' indexerar produktnamnet i tabellen Product, vilket gör det snabbare att söka efter produkter i webshopen, om man hade en textsökfunktion på sidan. Skillnaden blir att databasen endast kollar på 1 rad istället för en full table scan, vilket är ett bra resultat. Det andra indexet 'index_amount' indexerar antalet av varje produkt i lagret i tabellen Inventory. Detta kan vara användbart i ett framtida admingränssnitt. Skillnaden när jag kör 'EXPLAIN SELECT * FROM Inventory WHERE items < 75;' före och efter indexeringen är att raderna som genomsöks minskas från full table scan till 1, igen ett bra resultat. Jag skapade ett tredje index 'index_type' i tabellen content som indexerar innehållstypen. Detta används faktiskt i nuvarande implementering av sidan, och snabbar upp sökprocessen en aning. Det finns just nu 9 rader i tabellen och med hjälp av indexet söks endast 2, 3 respektive 4 rader igenom beroende på innehållstyp man letar efter. Dock fungerar detta inte helt klockrent. Om jag kör 'EXPLAIN SELECT * FROM Content WHERE type = 'post';' så kör databasen en full table scan, eftersom den verkar anse att indexet inte är tillräckligt bra i fallet med innehållstypen 'post'. Jag måste lägga till 'FORCE INDEX (index_type)' i ovanstående sats för att den ska använda indexet, som då går igenom 4 rader. Är det så att 4/9 rader är för icke-optimerat för att databasen ska använda det indexet? Jag läste också att man egentligen inte ska använda index på kolumner där det endast finns ett fåtal olika värden, som i detta fall. Nu blev det ändå såhär, då det var svårt att hitta andra platser att indexera.
</p>

<h3>Har du tidigare erfarenheter av att skriva kod som testar annan kod?</h3>
<p>
    I oopython-kursen använde vi enhetstester på ett mycket snarlikt sätt för att testa våra klasser, så proceduren här kändes väldigt bekant. Det var lätt att ta till sig PHPUnit och komma igång.
</p>

<h3>Hur ser du på begreppet enhetstestning och att skriva testbar kod?</h3>
<p>
    Jag känner mig tudelad inför enhetstestning. Att skriva testbar kod är jättebra och skapar en viss säkerhet när koden växer, så att grundfunktionerna i koden fortsätter att fungera. Jag tycker att filosofin bakom testdriven kod är bra, att man ska ha testerna som utgångspunkt och alltid återkomma till dem. Då vet man också om koden man skrivit följer den ursprungliga specifikationen. Samtidigt så kan kodstrukturen förändras väldigt mycket under arbetets gång och det man i början trodde var en bra uppdelning av till exempel metoder och klasser kanske visar sig inte optimal. Då behöver man istället skriva om sina tester, vilket leder till en hel del extra arbete.
</p>
<p>
    Mitt stora problem med enhetstestning är att den inte alltid känns som att den testar koden realistiskt. Man testar enskilda enheter av koden vilket är bra för att kolla att grundfunktionaliteten är okej, men i verkiiga projekt ligger många problem i väldigt komplex kod och samverkan mellan olika enheter i koden. Där upplever jag att enhetstestning inte kan täcka upp helt, om man inte skriver hutlöst många tester med alla tänkbara specialfall. Någonstans där slutar enhetstesterna att göra arbetet effektivare. Sammanfattningsvis så tycker jag att enhetstestning är bra och ska användas, men med viss måtta.
</p>

<h3>Hur gick det att hitta testbar kod bland dina klasser i Anax Lite?</h3>
<p>
    De flesta klasserna har något yttre beroende vilket gjorde dem olämpliga för uppgiftens omfattning. Antingen var de beroende av en databaskoppling, eller sessioner och kakor. Jag bestämde mig därför för att testa klassen TextFilter, som är rakt på sak och enkel att testa utan att bygga upp en komplex testmiljö. Jag testar alla metoder i klassen och den processen gick ganska smidigt, då klassen är väldigt enkel och alla metoderna gör samma sak, men med olika filter. Det gick också enkelt att testa Guess-klassen och lyckas nå 100% kodtäckning där. Dock saknades GuessException-klassen i mitt repo, så jag måste skapa den själv för att kunna testa den och få allt att gå igenom.
</p>


<h2>Kursmoment 07/10</h2>

<h3>Krav 1 - Struktur och innehåll</h3>
<p>
    Jag har kört en helt ny installation av anax-lite och dragit ner alla moduler på nytt med composer för att få en ren start. Jag har tagit in delar av me-sidan men allt som inte kändes direkt relevant har jag lämnat bort, såsom CImage och klasserna Cookie och Calendar. Jag strukturerade om en del, dels för att me-sidan inte var optimalt strukturerad och behövde städas, dels för att passa in i kraven för projektet. Detta är kanske mest synligt i routerna och view-mappen. Exempelvis så skickar jag inte innehåll från formulär, såsom inloggnings- och registreringsidorna, till egna router utan låter allting hanteras i samma route där formuläret ligger. Detta underlättar att skicka "flash"-meddelanden till sidan om hur formulärhanteringen gått. Nackdelen är dock att POST-värdena ligger kvar och skräpar så om man laddar om sidan så blir upplevelsen inte så smidig.
</p>
<p>
    Det mesta av innehållet var enkelt att lägga in, då grunden låg i me-sidan. Detta inkluderar headern, footern, om-sidan och bloggen. Även admingränssnittet fanns ganska långt redan gjort, men jag strukturerade om det lite grann på själva webbplatsen för att göra det mer överskådligt. Länken till adminsidan ligger i footern, men är synlig endast om man är inloggad som admin. Förutom det som specificerats ska ligga i admingränssnittet finns även alternativet att återställa databasen. Databasens grundläge, som man hamnar i när man återställer databasen, innehåller några färdigt sålda produkter och ordrar i uppvisningssyfte. Jag blev tvungen att ge alla tabeller, procedurer och annat nya namn för projektet eftersom allting måste ligga i samma databas på studentservern, och funktionerna för projektet är väldigt lika men med små skillnader från databasdelen på me-sidan.
</p>
<p>
    I specifikationen står det "webbsidan skyddas av inloggning", vilket jag har tolkat som att det syftar på redigeringen av sidans innehåll och att man ändå kan besöka sidan utan inloggning, då det skulle kännas klumpigt att behöva logga in bara för att surfa runt på sidan. Vidare står det i specifikationen kring tester att "det räcker om det finns testfall i samma omfång som i kmom06". Detta tolkar jag bokstavligen och använder samma testfall som jag hade i kmom06 för klassen TextFilter, eftersom alla andra klasser i projektet kräver databasuppkoppling, session eller på annat sätt är svårtestade.
</p>
<p>
    Jag måste be om ursäkt för det ganska horribla utseendet, men kunden ville ha dessa färger. Sedan så tog tiden verkligen slut för mig och jag hade sparat stylandet till sist eftersom det inte nämndes något om det i kravspecifikationen.
</p>

<h3>Krav 2 - Kundkonton</h3>
<p>
    Högst upp i högra hörnet finns en Logga in-knapp. När man väl är inloggad så byts detta ut mot en liten användarmeny, där man kan gå till profilen, varukorgen eller logga ut. De uppgifter som man kan spara i sitt användarkonto är för- och efternamn samt e-postadress. Användarnamnet går inte att ändra efter att det är skapat eftersom det används som nyckel i databasen. Kontodetaljerna kan uppdateras på ens profilsida. Där kan man även gå till sin orderhistorik. På admin-sidan så kan man också hantera konton ganska fritt. Man kan lägga till, redigera och ta bort konton. Ett konto raderas dock inte permanent från databasen utan markeras endast som raderat i tabellen och förhindrar ytterligare inloggning, men kontot ligger kvar i databasen för att orderhistoriken ska fortsätta fungera. Administratören kan ändra om konton ska tillhöra typen kund eller administratör, och är ett konto en administratör så kan det kontot inte tas bort.
</p>
<p>
    För att spara tid så gör jag inte så heltäckande validering av formulärsinformationen utan väljer att i denna version nöja mig ganska långt med HTML-attribut i formuläret såsom required och krav på input-typen och liknande. Jag är dock medveten om bristerna i detta. Åtminstone gör jag en granskning av uppgifterna när en ny kund registrerar sig så att inga specialtecken såsom vinkelklamrar och ampersands kommer med i användarnamnet och liknande. Givetvis använder jag prepared statements när information ska läggas in i databasen och escapar allt som skrivs ut på sidan som en användare kan ha redigerat. Däremot har jag inte säkrat för XSS injections på alla ställen i admingränssnittet, men jag tänker att administratören vet vad den gör och får någon obehörig tillgång till admin-sidan så är skadan redan skedd. Jag har också valt bort att spara uppgifterna i ett formulär om det är något som måste korrigeras, så om man gör ett fel i registreringen så måste i nuläget allting fyllas i på nytt.
</p>

<h3>Krav 3 - Produkter</h3>
<p>
    Jag har skapat en bokhandel för att kunna ha en tydlig profil och enkelt att hitta produkter att sälja, samtidigt som det är lätt att dela in dem i olika kategorier och dessutom ge vissa produkter fler och vissa färre kategorier. Jag bestämde mig för innehållet ganska sent, så därför finns inte författare som en egen kolumn i produktkatalogen vilket skulle vara logiskt, utan ligger i beskrivningen istället. Alla bilder är tagna rakt av från nätet, men mitt repo på github är privat och detta är endast ett skolprojekt så jag hoppas att detta är tillåtet, för det är svårt att hitta bilder som jag skulle ha fullständig rätt att använda i detta fall. För att göra produktkatalogen mindre tabellaktig så har jag struntat i de vanliga kolumnerna och layoutat innehållet lite friare. Klickar man på produkter så kommer man till produktens egen sida, som innehåller i stort sett samma information och funktionalitet som i katalogen. Det finns sök-, paginerings- och sorteringsmöjligheter enligt specifikationen. Även produkter som det för tillfället finns 0 av i lagret syns i produktkatalogen.
</p>
<p>
    Jag ville först göra det möjligt att lägga till i varukorgen utan att vara inloggad, men efter att ha läst en diskussion kring detta på forumet och tänkt igenom det så släppte jag den tanken, eftersom kravet var att varukorgen skulle ligga i databasen. Användaren ombeds därför logga in om de försöker gå till varukorgen eller lägga till något i den. Sidan sparar ändå vilken produkt det var som användaren klickade på i sessionen så att användaren efter inloggningen skickas till den produktsidan. Lägger man till något som redan finns i varukorgen så uppdateras antalet istället. Om man försöker lägga till mer produkter än som finns i lager så varnas man för att detta inte går. Samma funktionalitet finns också på själva varukorgssidan. Om man i varukorgen bekräftar sin order så skapas ordern och lagret uppdateras. Användaren skickas till en sida med en orderbekräftelse, som senare kan nås från orderhistoriken på användarens profilsida.
</p>
<p>
    För att databasen inte ska gå sönder så kan administratören inte ta bort produkter helt och hållet om produkten existerar i en bekräftad order. Istället markeras den produkten som borttagen och syns inte längre för användare, men finns kvar i databastabellen. I kmom06 byggde jag en databasimplementation för att man ska kunna ta bort ordrar om den inte hunnit levereras ännu, men detta har jag tagit bort i detta projekt för att inte göra det för krångligt för mig själv. Jag har också prioriterat bort att administratören ska kunna se alla ordrar som gjorts. Däremot så kan administratören på en egen sida (länken finns på adminsidan för produkter) se en lista på produkter som det finns färre än 5 kvar av i lager, så att en ny beställning kan göras av dessa varor.
</p>

<h3>Krav 4 - Förstasidan</h3>
<p>
    Bloggöversikten lade jag in väldigt enkelt och ganska likt hur det är löst på den egna bloggöversiktsidan. Tre inlägg syns med rubrik och en liten bit av texten, och hela inlägget är klickbart och leder till dess egen sida. Jag har en ruta som visar upp den mest sålda boken, vilket baserar sig på den bok som har flest exemplar bland alla ordrar som gjorts. En annan ruta listar de tre senaste böckerna som kommit, vilket grundar sig på deras id-nummer, då dessa autoinkrementeras vilket gör att en senare inlagd produkt alltid har ett högre id-nummer. En ruta berättar om vilken bok som rekommenderas, vilket inte har någon annan funktion än att skylta med en vald produkt. Detta justeras enkelt genom en select-lista på admin-sidan för produkter, resten av rutans innehåll är förutbestämt. Till sist så finns rutan för veckans erbjudande. Detta styrs genom en egen admin-sida som nås från admin-sidan för produkter. På den sidan väljer man först en produkt och sedan ett procenttal för hur stor rabatten ska vara. När man utför ändringen så ser man det ursprungliga priset för produkten och det reducerade priset. Det reducerade priset är det som syns för användaren också och beställer man en rabatterad produkt så skapas ordern med det priset. Detta görs genom att rabatten ligger i en egen databastabell, så att produktens originalpris aldrig förändras i produkttabellen. När en order skapats så upphör kopplingen för priset till produkttabellen, så om man senare ändrar priset för en produkt så ändrar det inte summan i ordern.
</p>

<h3>Krav 5 - Produktkategorier</h3>
<p>
    Detta var en mycket intressant utmaning att få att fungera. Dels låg utmaningen i att implementera detta så att databasen och sidan kunde hantera multipla kategorier överhuvudtaget, dels att kunna filtrera produktkatalogen efter kategorier och dels att skapa kategorimolnet på förstasidan. För att kunna lägga till produkter och redigera dem i admingränssnittet så fick jag göra om mitt API till databasen en del, eftersom ett obestämt antal kategorier inte kan skickas in till en procedur i en databas som en array eller på något annat sätt. Istället behövde jag i fallet med att lägga till en ny produkt först skapa produkten, skicka tillbaka produkt-id:et och sedan loopa igenom kategorierna och lägga in dem i kategoritabellen en för en, tillsammans med produkt-id:et. För att kunna skapa kategorimolnet på förstasidan så har jag en egen metod i min Product-klass som hämtar antalet produkter i varje klass samt det totala antalet produkter och räknar ut varje kategoris procentuella innehav av produkter. Genom en switchsats och lite balanserande matte så får jag sedan fram en fontstorlek för varje kategori som sedan är det som bestämmer ordets storlek på sidan.
</p>
<p>
    Jag har gjort det möjligt att kunna filtrera produkterna i katalogen med en eller flera kategorier. Det går också att kombinera filtreringen med fritextsökningen. Eftersom jag hämtar informationen till katalogen från en vy som konkatenerar alla kategorier till en kommaseparerad sträng så blev det plötsligt lite oväntat krångligt att kunna leta igenom produkterna och få fram korrekta produkter enligt vald kategori. Det krävdes till sist en regular expression för att få det att fungera.
</p>

<h3>Allmänt om projektet</h3>
<p>
    Till största delen så gick projektet ganska smidigt och några riktigt komplexa problem hade jag inte. Jag har använt git ganska mycket och skapat många commitar och taggar, vilket kändes tryggt. Dock insåg jag i ett sent skede att inloggningsuppgifterna till min databas ligger i några av de tidigare commitarna som jag laddat upp på github. Nu är det ju ett privat repo men jag ville ändå lära mig hur man raderar filer från hela sin commit-historik, en lärorik upplevelse.
</p>
<p>
    Det gick väldigt mycket tid mot slutet av projektet åt att putsa på funktionaliteten och fixa en hel del halvkniviga buggar och problem som jag inte sett tidigare. Ett av dem var när jag skulle leta igenom en inte helt optimal vy för produkterna för att filtrera dem efter kategori, som jag löste med regex till slut, men det tog mycket trial&error att komma dit. I början ville jag ha en ren och städad projektmapp i såväl router, klasser som databas. Jag lyckades ganska bra med detta i början och att hålla koden DRY, fram till uppgiften om förstasidan, som jag började med först efter att jag var säker på att jag hade de obligatoriska kraven under kontroll. I och med den uppgiften och sedan ännu produktkategorierna som skulle in så blev det mer kaos i koden igen. Ett annat jobbigt fel var att jag i en procedur skapade en lokal variabel som hade samma namn som en av tabellkolumerna jag hämtade inuti proceduren, vilket gjorde att proceduren hämtade ett null-värde varje gång. Detta ledde till att det gick att beställa produkter över lagrets kapacitet, trots att proceduren var ämnad att stoppa just detta. Det tog ett bra tag att hitta det felet, och det är konstigt att jag inte upptäckt det felet förut då den delen av databasen funnits med redan tidigare i kursen. Jag är lite nervös över om allt kommer att fungera på studentservern för granskaren, för detta projekt innehåller så många delar och små detaljer att det är svårt att veta om man verkligen testat allt. Samtidigt så känner jag mig relativt säker på att min lösning är stabil och jag är nöjd med min insats (förutom utseendet, som verkligen havererade denna gång).
</p>
<p>
    Det känns som ett väldigt bra och lagom projekt att avsluta kursen med. Givetvis är det tillfredsställande att till slut bygga hela webbshoppen som vi jobbat med delar av under kursens gång, och nu vet jag att jag kan bygga en webbshop om det skulle behövas. Det kändes också som ett projekt som krävde att man använde allting av det vi gått igenom under kursen.
</p>

<h3>Om kursen</h3>
<p>
    Som helhet har jag tyckt mycket bra om denna kurs. Det har varit många väldigt användbara saker som vi har lärt oss. Att skapa en webbshop och en blogg som sparas i en databas är så konkreta kunskaper som något kan bli. Jag har också fått en mycket bättre förståelse för begreppet ramverk genom att vi tittade på dem genom olika moduler och hur man kan välja att implementera det. SQL har även öppnat sig för mig. Jag hade det dock väldigt tufft i början av kursen, inte för att svårighetsgraden var för hög utan för att mängden var för stor. Det kom inte heller mindre kursmoment senare som skulle ha hjälpt mig att komma ikapp, så jag tycker att kursen var för stor för tiden det fanns att göra den på. Jag tycker också att det var riktigt slappt att inte ge några riktiga läsanvisningar i de tidigare kursmomenten utan bara säga läs efter eget sinne. När jag funderar på begreppet objektorientering och denna kurs så känns det inte som att vi jobbat särskilt mycket med objektorienterad programmering, i alla fall inte i samma mening som under oopython-kursen. De klasser vi skapat har främst använts som behållare och grupperare av funktioner, vilket ju är praktiskt i och för sig, men det är inte i anda med det vi lärt oss tidigare att objektorienterad programmering och objekt ska vara, en kombination av egenskaper och beteenden. Kanske var det meningen, men det var nu en sista observation från min sida.
</p>
<p>
    Som sagt var så är jag riktigt nöjd med denna kurs, bortsett från några små anmärkningar. Det får bli bli 7/10 i betyg till kursen.
</p>
