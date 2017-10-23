---
title: "Redovisning av kursmoment"
flash: "img/bg1.jpg"
...

Redo&shy;visning
================

Här följer redovisningarna som hör till kursen <strong>ramverk1</strong>.

##### Kursmoment

1. [Kmom01](#kmom01)
2. [Kmom02](#kmom02)
3. [Kmom03](#kmom03)
4. [Kmom04](#kmom04)
5. [Kmom05](#kmom05)
6. [Kmom06](#kmom06)
7. [Kmom10](#kmom10)


Kmom01  {#kmom01.anchor}
------

Jag gjorde det enkelt för mig denna gång och körde kort och gott `anax`-kommandot direkt från början, för att sedan gå igenom den genererade koden och ändra en del saker så att de bättre passar mig. 
Jag kopierade sedan in min existerande navigations&shy;lists&shy;lösning från <strong>oophp</strong>, i förenklad och något modifierad form, 
samt gjorde en liten specialare i grund&shy;layouten för att få det som jag ville ha det den här gången; specifikt genom att lyfta ut <code>h1</code>:an 
till en egen sektion programmatiskt och lägga till stöd för att kunna styra flashbilden genom frontmattern. Som vanligt är allt helt och hållet responsivt också.

I övrigt kändes detta mest som "intet nytt under solen", då det börjar bli många me-sidor nu, så den största utmaningen var egentligen att komma på ett nytt utseende för n:te gången...


###### Gör din egen kunskaps&shy;inventering baserat på PHP: The Right Way och berätta om dina styrkor och svagheter som du vill förstärka under det kommande året.

Jag känner rent allmänt att jag behärskar språket och miljön kring PHP väl, då jag jobbat med dessa under lång tid och därmed skaffat mig god erfarenhet om möjligheter, genvägar och fallgropar. 
Med det sagt finns det alltid saker att lära sig och utifrån uppräkningen av tekniker på [PHP: The Right Way](http://www.phptherightway.com/) 
skulle jag säga att det framför allt är inom *dependency injection*, testning och driftsättning/<wbr>virtualisering som jag känner att det saknas en del. 
Då är det också mycket lämpligt att den här kursen kommer att fokusera på just dessa områden.

###### Vilket blev resultatet från din mini&shy;undersökning om vilka ramverk som för närvarande är mest populära inom PHP?

Den vanligaste bilden, vart man än vänder sig, tycks vara att det är [Laravel](https://laravel.com/) som kniper förstaplatsen med rätt god marginal, 
med främst [Symfony](https://symfony.com/), [CodeIgniter](https://codeigniter.com/), [Yii](http://www.yiiframework.com/), [CakePHP](https://cakephp.org/) och [Zend](https://framework.zend.com/) 
i olika konstellationer därunder. Flera av de senare har många år på nacken vid det här laget, men tydligen gör de något rätt eftersom folk fortsätter att använda dem. 
Andra, speciellt mindre ramverk dyker också upp i listorna här och var, men i mindre konsekvent omfattning, och inom kretsar som har större fokus på prestanda tycks [Phalcon](https://phalconphp.com/) 
vara det givna valet -- medan det knappt omnämns i andra.

> __Källor:__
> 
> * [__Medium:__ Best PHP Frameworks In 2017](https://medium.com/level-up-web/best-php-frameworks-for-web-developers-in-2017-c8a041671a79)
> * [__Archer Software:__ Top 7 Best PHP Frameworks for 2017](http://www.archer-soft.com/en/blog/top-7-best-php-frameworks-2017)
> * [__SitePoint:__ The State of PHP MVC Frameworks in 2017](https://www.sitepoint.com/the-state-of-php-mvc-frameworks-in-2017/)
> * [__Coders Eye:__ 11 Best PHP Frameworks for Modern Web Developers in 2017](https://coderseye.com/best-php-frameworks-for-web-developers/)
> * [__DZone:__ Top PHP Frameworks of 2017](https://dzone.com/articles/top-php-frameworks-of-2017)
> * [__Vtrio:__ Top 5 PHP Frameworks of 2017](https://www.vtrio.com/blog/top-5-php-frameworks-of-2017/)
> * [__Quora:__ What is the best PHP framework 2017?](https://www.quora.com/What-is-the-best-PHP-framework-2017)
> * [__In'saneLab:__ Is Laravel the Best PHP Framework in 2017?](https://insanelab.com/blog/web-development/laravel-best-php-framework-2017/)


###### Berätta om din syn/<wbr>erfarenhet generellt kring communities och specifikt communities inom open source- och programmerings&shy;domänen.

Båda positiva och negativa. Det kan vara mycket värt att samverka med folk med vilka man delar kunskap, fokus, intresse och rentav passion, 
då det säkerställer god kommunikation och förståelse vilket i sin tur leder till både gott utbyte/<wbr>god hjälp och gott kamratskap. Dbwebb är ett bra exempel på detta.

Å andra sidan kan det också slå över och bli uteslutande, snobbigt och segregerande, 
inte minst när det bildas faktioner med nästintill vattentäta skott inom något som från början var tänkt att vara *en* gemenskap. 
Tyvärr tycks detta vara särskilt vanligt inom just "open source- och programmerings&shy;domänen", där just PHP som många nog känner till har en... låt oss säga *brokig* historia.

Det senare fallet kan vara svårt att komma tillbaka ifrån och det verkar även avskräckande på nykomlingar som annars skulle vara mycket väl betjänta av att omfattas av det förra. 
Moderation anbefalles.

###### Vad tror du om begreppet “en ramverkslös värld” som framfördes i videon?

Jag tycker det känns som något av en utopi, om än en önskvärd sådan. Grundproblemet är att för att det skall kunna bli verklighet -- 
för att *någonting* som enbart bygger på interface skall kunna bli verklighet -- så måste *alla* vara helt och hållet överens om exakt *hur* detta interface skall se ut, 
vilket är [tämligen osannolikt](https://xkcd.com/927/). Har man inte en sådan överenskommelse faller hela upplägget och man är tillbaka i starka kopplingar modulerna emellan på nolltid.

Att bryta upp stora, monolitiska kodbaser till förmån för mindre integrerbara komponenter är jag dock helt för, i alla sammanhang, 
men frågan är alltså hur långt detta visar sig praktiskt möjligt att uppnå över tid.

###### Hur gick dina förberedelser inför kommentars&shy;systemet?

Uppgiften och syftet var så vagt formulerade att det inte "gick" särskilt mycket alls, annat än lite allmänna reflektioner över hur kod- och främst databas&shy;strukturen skulle kunna se ut. 
Någon kod kändes det inte vara någon mening med att skriva än, så jag avvaktar tills det blir tydligare vad det egentligen är som skall göras.


Kmom02  {#kmom02.anchor}
------

I samband med arbetet med REM-servern och kommentars&shy;modulen (se nedan) har jag gjort en del strukturella ingrepp i ramverket. 
För det första har jag ändrat i hur standard&shy;layouten hanteras, så att jag på ett enkelt sätt kan låta kontroller anropa `App` 
för att rendera en godtycklig vy med samma utseende som det filbaserade innehållet, så att det blir äkta MVC med alla tre ben. 
Detta var speciellt användbart när jag kom till inloggnings&shy;funktionen (se nedan under kommentars&shy;modulen).

För det andra har jag brutit ut koden ur den tidigare *flat-file-content.php* till två nya klasser -- `ContentController` och `ContentService` -- 
som tillsammans sköter visningen av Markdownfilerna i *content*-katalogen. Svaret på frågan i uppgift 1 tyckte jag alltså var "ja", 
så jag inte bara övervägde att skriva om koden utan gjorde det också.


###### Vilka tidigare erfarenheter har du av MVC? Använde du någon speciell källa för att läsa på om MVC?

Jag har "utsatts" för det i ett antal olika sammanhang, akademiska såväl som "privata" och arbetslivs&shy;relaterade, i lite olika tappningar. 
Jag har även byggt och underhållit flera applikationer enligt upplägget på flera olika plattformar, men är mest van vid ASP.NET MVC, 
särskilt eftersom det är det jag (av och till) använder i mitt nuvarande arbete. Dbwebb fick räcka som läsning den här gången.

###### Kan du med egna ord förklara någon fördel med kontroller/modell-begreppet, så som du ser på det?

Det ger en god s.k. *"separation of concerns"*, där varje del ansvarar för en specifik sak, eller en samling relaterade saker, 
istället för att man har en enda stor klass/<wbr>funktion/<wbr>komponent som gör allt. 
Detta gör i sin tur koden lättare att underhålla och testa samt gör det möjligt att återanvända och byta ut enskilda delar -- 
åtminstone i teorin.

Samtidigt är just MVC inte någon magisk *Ultimat Lösning&reg;* på samtliga utvecklings&shy;problem -- 
dels är det för det mesta som redan nämnts bara en del i ett större sammanhang och dels finns andra sätt att organisera koden som också uppnår samma mål, 
i samma eller andra sammanhang. Dessutom finns det risk att man gör saker onödigt komplicerade för sig om man *alltid* bryter upp även de minsta problemen i en massa småbitar bara för att man 
*"skall"* göra det, då själva upplägget i sig medför en ökad komplexitet som kanske inte är önskvärd (och definitivt inte *nödvändig*) i alla typer av projekt.

###### Kom du fram till vad begreppet SOLID innebar och vilka källor använde du? Kan du förklara SOLID på ett par rader med dina egna ord?

Här blev det Wikipedia och några olika YouTube-videor. Rent allmänt tenderar informationen om SOLID att vara något luddig, 
så det underlättar när förklaringarna innehåller konkreta kodexempel och inte bara abstrakta definitioner. D:et är tydligen särskilt svårfångat och är i mitt tycke dessutom felbenämnt, 
då det egentligen inte är fråga om en *inversion* -- meningen är inte att man skall gå från att högnivåkod beror av lågnivåkod till att lågnivåkod beror av högnivåkod, 
utan att bådadera beror av en abstraktion som ligger utanför dem båda.

Så: SOLID innebär att man skall skriva kod som är uppdelad i mindre delar som var och en sköter en specifik, begränsad uppgift och har ett specifikt, begränsat ansvar **(S)** 
enligt specifika, begränsade kontrakt med övriga delar av koden **(I)**. Vidare skall funktionaliteten hos varje sådan del gå att bygga på utan att något i den existerande implementationen ändras **(O)**, 
samt att en sådan utökning endast är just en *utökning* och inte påverkar något i den ursprungliga funktionaliteten **(L)**. Slutligen skall alltså beroenden mellan delarna göras abstrakta, 
så att den styrande koden på hög nivå inte behöver känna till något om hur den implementerande koden på låg nivå faktiskt utför sina uppgifter (t.ex. en databaskoppling), 
utan endast behöver delegera dessa uppgifter enligt allmänna kontrakt som båda nivåerna förbinder sig att följa **(D)**.

###### Gick arbetet med REM-servern bra och lyckades du integrera den i din me-sida?

Det var inga problem alls -- all kod var ju redan skriven, så det fanns liksom inte så mycket att misslyckas med... 
Därför tog jag tillfället i akt och skrev om delar av koden enligt eget gottfinnande, med lite enligt mitt tycke smartare lösningar. 
Detta inkluderade bl.a. utökad felhantering, men på grund av en begränsning i `Anax\Response` fick jag använda statuskod 500 istället för 400 vid felaktig indata, 
då jag inte iddes skriva en egen modul bara för den saken. Jag gjorde även så att posterna alltid returneras i stigande ordning baserat på ID, oavsett den interna ordningen i datamängden.

*__OBS:__ Eftersom det som sagt egentligen var så lite att göra brydde jag mig aldrig om att spara och testa något någon annanstans först, utan lyfte in koden direkt i Anax.*

*__Uppdatering 2017-09-11:__ Efter att Anaxmodulen ifråga uppdaterats returnerar nu REM-servern som önskat statuskod 400 vid felaktigt indataformat.*

###### Berätta om arbetet med din kommentarsmodul. Hur långt har du kommit och hur tänker du?

Rätt långt -- längre än väntat och kanske till och med lite *väl* långt för att vara så pass tidigt, men vi får se. 
Jag började med att tänka igenom arkitekturen för hela systemet ordentligt, ur ett framåtblickande perspektiv för att inte måla in mig i hörn, 
så det tog någon dag innan jag skrev en enda kodrad.

När jag väl satte mig vid tangentbordet hade jag bestämt mig för att dels göra som föreslaget och endast använda sessionen för lagring och dels integrera användar&shy;inloggning direkt. 
Data&shy;strukturerna är att betrakta som förlagor till en kommande databas&shy;modell, med "simulerade" 
främmande nyckel-kopplingar och vissa special&shy;lösningar för att passa inom de för tillfället valda ramarna. 
Jag övervägde en kort stund att nyttja REM-servern fullt ut även här, men bestämde mig för att hålla modulen separat, även om det innebar en del duplicerad eller snarlik kod i det här skedet. 
Tanken är att det skall vara så enkelt som möjligt att övergå till en databas som datakälla för M:et senare och att så mycket som möjligt av V:et och C:et skall gå att återanvända då.

Jag stötte dock genast på ett uppenbart problem, nämligen det att så länge innehållet är filbaserat finns inget 100&nbsp;% tillförlitligt sätt att unikt identifiera enskilda sidor -- 
filer kan byta namn, URL:er kan ändras och konfigurations&shy;värden kan skrivas över, medan en primärnyckel i en databas är konstant över tid. 
Jag bestämde mig till slut för att välja det i mitt tycke minst dåliga alternativet och lade in två nya (frivilliga) rader in frontmattern: `id` som identifierar sidan och `comments` 
som styr huruvida det skall gå att kommentera den eller inte. För tillfället tillåts kommentarer endast på "Om"- och "REM"-sidorna.

Jag valde även att tillåta både anonyma och inloggade kommentarer, där jag skapar och återanvänder användarposter (för tillfället alltså i sessionen, på sikt i databasen) 
även för den första typen så att jag kan nyttja samma koppling mellan "tabellerna" på ett konsekvent sätt. E-postadressen är frivillig och används för att hämta en retrobild från Gravatar. 
En inloggad användare kan redigera och ta bort sina egna kommentarer medan en inloggad administratör kan redigera och ta bort samtliga kommentarer. Om en kommentar har redigerats visas det i vyn.

När det kommer till presentationen av kommentarerna lät jag mig svepas med lite grann, så även om det bara skulle vara en prototyp är systemet ganska väl utbyggt redan nu. 
Jag har lagt till stöd för att konfigurera sorterings&shy;ordning (standard: fallande på datum) och maximal ålder (standard: ingen) 
och har stilsatt såväl lista som formulär ordentligt, även responsivt (så klart). Texten skrivs som föreslaget i Markdown, 
men för att man inte skall kunna påverka sidans övriga struktur, avsiktligt eller av misstag, rensar jag bort eventuella HTML-taggar innan den renderas. 
Jag kunde heller inte hålla mig från att göra en lite mer dynamisk hantering av redigeringen, som nu hämtar Markdown&shy;källan med AJAX och ersätter den renderade texten med ett redigerings&shy;formulär 
(som kan döljas igen). Vad kan jag säga, jag gillar att sitta och utveckla i frontend...

Kommentars&shy;systemet och användar&shy;hanteringen följer samma uppdelning i routefunktioner, kontroller och datalager, 
där den senare alltså även har helt egna vyer som ändras beroende på om man är inloggad eller inte. Just nu finns det inte så mycket där, 
men det är enkelt att utöka saker och ting härifrån vad det lider. Själva inloggningen sker på sedvanligt sätt med hashade lösenord och användar-ID:t sparas sedan i sessionen 
(kontona *doe*/*doe* och *admin*/*admin* läggs automatiskt till i användarlistan i sessionen vid varje anrop om de inte redan finns där, så att de alltid går att använda). 
Flash&shy;meddelanden är även implementerade och kan användas var som helst.


Kmom03  {#kmom03.anchor}
------

Det tog sin lilla stund att "konvertera" hela ramverket till DI-läge, men det gick ändå bra -- en sak i taget bara. 
Problemet var dock att i princip allting måste vara på plats innan man kunde testköra någonting, så det blev mycket att skriva "i blindo", 
men felen var lyckligtvis få och enkla att rätta (tack även till *mos* som snabbt fixade en del buggar/<wbr>tillägg i Anax&shy;komponenterna).

Jag har valt att skicka in hela `$di`-objektet i samtliga kontroller, genom att uppdatera min tidigare basklass för dessa. 
Jag kunde egentligen valt att göra detsamma med tjänsterna -- och gjorde det först -- men jag gav mig istället på att göra `inject`-metoden från REM-server&shy;exemplet allmängiltig, 
så att man kan tillgängliggöra godtyckliga beroenden för godtyckliga tjänster.

Jag ville dock fortfarande kunna använda samma anropsformat överallt (se nedan), så jag skapade en ny klass `DISimple` som implementerar `DIInterface` och använder `DIMagicTrait`, 
men enbart lagrar referenser och inte laddar några egna tjänster. Jag kunde sedan göra en basklass för mina tjänster som använder denna enklare behållare för att lagra och nyttja inskickade beroenden, 
men för att behålla full flexibilitet lade jag även till möjligheten att skicka in en existerande behållare i konstruktorn istället -- 
vissa tjänster har så pass många beroenden att det är enklare att ge dem tillgång till hela `$di` istället för att skicka in alla referenser för sig. 
Om detta är det bästa sättet att lösa problemet vet jag inte, men jag känner mig rätt nöjd med hur det färdiga resultatet kan användas i den anropande koden, 
som nu alltså får ett konsekvent utseende i alla ingående delar.

Jag har även passat på att städa lite och bryta ut en del kod till nya/<wbr>andra klasser och/<wbr>eller grupperingar, allt för att skapa en tydligare och mer lättanvänd struktur, 
samt ändrat en och annan detalj här och var, bl.a. genom att sanera kommentars&shy;texterna vid utskrift istället för att kategoriskt ta bort alla eventuella taggar däri.


###### Hur känns det att jobba med begreppen kring "dependency injection", "service locator" och "lazy loading"?

Jag känner igen dem sedan tidigare, i en eller annan form, så det handlade mest om att applicera dem i just den här situationen. 
Dock får jag säga att jag håller med om den kritik som riktas mot *service locator pattern* och att man får se upp en del när man sysslar med såna här "uppskjutna" saker, 
då det är lätt hänt att man skapar oförutsägbara och svårlösta problem för sig själv. (Been there, done that...)

###### Hur känns det att göra dig av med beroendet till `$app`? Blir `$di` bättre?

Bättre och bättre... I sista ledet, där anropen till tjänsterna ligger, är den enda egentliga ändringen för min del att `$this->app` nu blivit `$this->di` istället, 
eftersom jag använder mig av den "magiska" DI-klassen för att slippa en massa metodanrop hela tiden. 
Övriga ändringar är mer vittgående och överlag känns det som att koden blivit krångligare, större, mer krävande och svårare att överblicka, 
så det återstår att se huruvida det här upplägget faktiskt medför reella fördelar *i det här sammanhanget*.

En tydlig effekt är dock att det inte bara är beroendet av `$app` som är borta, utan även den klassens hela existens&shy;berättigande då det nu inte finns några referenser kvar alls till den -- 
det finns helt enkelt ingen anledning att instantiera `$app` i *index.php* längre och definitivt inte att dessutom skjuta in `$di` däri. 
Den tidigare källkoden finns dock kvar i repot tills vidare, liksom de gamla konfigurations&shy;filerna.

###### Hur känns det att återigen göra refaktorering på din me-sida? Blir det förbättringar på kodstrukturen, eller bara annorlunda?

Det tarvades alltså en rejäl omstrukturering för att få till det nya upplägget och min upplevelse är som sagt att det på sina håll är *mindre* tydligt vad koden gör nu än tidigare. 
Det känns också som att det blivit mer upprepningar -- särskilt om jag hade följt förlagorna fullt ut, så jag har istället gjort vad jag kunnat för att automatisera återkommande saker, 
såsom instantieringen av kontroller i *config/di.php* som nyttjar PHP:s variabel&shy;expansion till det yttersta.

###### Lyckades du införa begreppen kring DI när du vidareutvecklade ditt kommentarssystem?

Inga problem -- eller i alla fall inga större problem än att få in `$di` i någon av de andra komponenterna. 
Snarare var det mest bara att byta ut referenserna (med sök och ersätt, till och med) och lyfta ut instantieringen/<wbr>konfigurationen av tjänsterna till de nya konfigfilerna, 
så det gick rätt snabbt i och med att allt annat redan var på plats.

###### Påbörjade du arbetet (hur gick det?) med databasmodellen eller avvaktar du till kommande kmom?

Jag hade redan tänkt ut det mesta kring den kommande databas&shy;strukturen när jag gjorde prototypen i [Kmom02](#kmom02), så det jobbet är mer eller mindre avklarat, 
inklusive inloggningsbiten och behörighets&shy;kontroller. Däremot valde jag att *inte* implementera någon databas&shy;koppling nu, 
eftersom jag vill vänta och se hur vi förväntas hantera en sådan först (med AR, troligen/<wbr>möjligen), så att jag slipper skriva om koden direkt.

###### Allmänna kommentarer kring din me-sida och dess kodstruktur?

Den ses över och förbättras/<wbr>justeras kontinuerligt i takt med att kodbasen växer och nya krav och insikter dyker upp. Rent allmänt är min ambition att slippa upprepa mig så långt som möjligt, 
men det är en hel del i upplägget och komponenterna som motarbetar denna strävan. Vi får se vem som vinner i slutändan...


Kmom04  {#kmom04.anchor}
------

Det tog en god stund innan jag kom igång med detta kursmoment, även om jag låg lite före i schemat, helt enkelt därför att jag efter att ha läst igenom artiklarna/<wbr>övningarna 
och kikat på exempelkoden kände att de nya komponenter som tillhandahölls inte höll måttet och jag lade därför en hel del tid på att fundera ut vad jag skulle vilja ha istället. 
Dessa tankar sammanfattade jag så småningom i ett [längre foruminlägg](https://dbwebb.se/forum/viewtopic.php?f=59&t=6816), 
men dessförinnan hade jag redan bestämt mig för att skriva och använda egna komponenter för formulär och databas&shy;åtkomst. 
Viss inspiration är hämtad från ASP.NET MVC och dess *HTML Helpers* samt Entity Framework, men de ingående koncepten är allmänna och inte knutna till något specifikt ramverk.

Eftersom jag alltså inte tyckte `HTMLForm` passade in i MVC-tänket och hela upplägget i hur komponenten användes kändes bakvänt valde jag ett helt annat tillväga&shy;gångssätt, 
där data&shy;bindning till modellen var en prioritet att få till för att slippa det manuella steget med att föra över och validera värden. I min tappning (se även [forumet](https://dbwebb.se/f/55531)) 
är det modell&shy;klassen som står för valideringen (genom `ValidationTrait` och `ValidationInterface`) och formulär&shy;klassen får en referens till en sådan modell inskickad. 
Det är sedan formulärets uppgift att binda fältens värden till motsvarande attribut i denna modell, i båda riktningar, men till skillnad från `HTMLForm` 
spottar min `ModelForm` endast ur sig HTML-kod för *enskilda fält* istället för hela formuläret i ett svep -- och endast på begäran, med specifika metoder 
(t.ex. <code>ModelForm::<wbr>checkbox()</code>) som även tillåter att man definierar övriga HTML-attribut som inte kontrolleras av data&shy;bindningen.

Bindningen sker på begäran med `populateModel()` och eventuella fält som inte matchar något attribut i modellen hamnar i en egen samling, 
som man sedan kan hämta ut värden från. När man anropar `validate()` anropas i sin tur modellens egen validering och man kan sedan hämta ut enskilda felmeddelanden för specifika fält/<wbr>attribut. 
Bundna fält, vars HTML-kod man hämtar genom ovannämnda metoder, får automatiskt CSS-klassen `has-error` om valideringen misslyckades för motsvarande attribut i modellen, 
vilket tillsammans med `getError()` ger vyn fria händer att fånga upp och presentera vad som gått snett. Man kan även lägga till egna fel för valfria fält programmatiskt, 
för fall som inte täcks av modellens interna datavalidering (t.ex. att det inte får finnas dubbletter av användarnamn, vilket kräver en databasfråga för att utröna).

Eftersom PHP inte har stark typning och `$_POST` alltid innehåller strängar hade jag först lite problem med att identifiera `NULL`-värden 
för databasens (och PDO:s) räkning, vilket slutade med att jag införde en skrivbar förteckning över icke-obligatoriska attribut i modell&shy;basklassen, 
så att t.ex. ett heltalsvärde som inte fyllts i i formuläret inte införs som `0` i databasen utan verkligen blir `NULL`.

Allt som allt känns min formulär&shy;komponent funktions&shy;mässigt sund, men den gör inte anspråk på att vara en komplett lösning; 
om inte annat så för att det bara är vissa fälttyper som implementerats hittills. På motsvarande sätt är heller inte modell&shy;valideringen fullständig, 
utan det är bara vissa typer av validerings&shy;regler som finns med för tillfället. I båda fallen är det behovsstyrt: jag har skrivit det jag har haft användning av, 
men inte svävat ut så mycket mer.

När det kommer till databasen avskrev jag *Active Record* i ett tidigt skede (se vidare nedan) och bestämde mig istället för att implementera en *Repository*-komponent. 
Denna instantieras med tabellnamn och modellklass samt en referens till databas&shy;modulen och representerar sedan hela samlingen (tabellen), 
med ansvar för att söka, räkna, hämta och uppdatera poster (rader) däri, där den inskickade modellklassen används för att representera enskilda poster. 
API:et är utlyft till ett eget interface som dessutom har utökats med ett till som inför möjlighet att automatiskt ta hänsyn till *soft deletion* (se nedan).

Själva implementationen av min `DbRepository`-klass utgår åtminstone delvis från den tillhanda&shy;hållna `ActiveRecordModel`, men erbjuder större möjligheter att påverka utfallet. 
Detta görs med hjälp av en privat frågebyggar&shy;metod som delegerar till databas&shy;modulen, vilket minskade mängden kod som behövde skrivas avsevärt. 
Jag har sedan en `RepositoryService` som genom en konfigfil skapar och sedan exponerar de samlingar som applikationen behöver genom en magisk metod, 
vilket gör det enkelt att skicka in en referens till en enskild samling där den behövs genom existerande mekanismer.

För att vara en fullfjädrad ORM behövs även ett enkelt sätt att följa främmande nyckel-kopplingar tabellerna emellan och min lösning på detta blev att skapa en allmän metod i min modell&shy;basklass, 
som tar ett nyckelnamn och en *Repository*-instans som parametrar. På det sättet upprätthålls DI-tänket, 
även om man kanske skulle kunna lösa det på ett mer deklarativt sätt och nyttja magiska metoder även här. En annan möjlighet är att, på begäran, 
utföra en (1) `JOIN`-operation och sedan dela upp resultatet i separata (men länkade) modellinstanser, men det var inget jag kände att jag ville ge mig på, 
så nu blir det en (1) operation per post istället. Det här med ORM:ar är rätt invecklat när man börjar komma längre in i dem...

Bokexemplet gjorde jag från grunden, eftersom den automat&shy;genererade koden alltså inte passar in i min nya arkitektur, vilket var tämligen enkelt när jag väl hade verktygen på plats. 
Här blev det också tydligt hur kraftfull automatiken är när den används rätt och för att demonstrera hur allt samverkar är formuläret (som delas av skapa- och redigera-vyerna) 
något "saboterat" så att det blir lätt att framkalla fel -- testa exempelvis med tomma fält och att överskrida (interna) maxlängder. 
Observera även att anropen till bokmodellens *Repository* till skillnad från användarna och kommentarerna (se nedan) här ligger direkt i kontrollen, som dessutom är lite annorlunda utformad, 
då jag inte såg något särskilt behov av att införa en separat "boktjänst" för basal CRUD-funktionalitet i och med att all dataåtkomst&shy;kod ändå är allmän och ligger i `DbRepository`. 
Se det som en illustration av hur samma typ av uppgift kan lösas på olika sätt.

Summa summarum blev det en riktigt mastig vecka, men jag var också fullt beredd på detta när jag tog mig an utmaningen. Det känns som att det gick rätt bra ändå, 
även om det också är tydligt att det går att utveckla tankarna och implementa&shy;tionerna mycket mer, givet tid. 
I övrigt har jag infört en variant av under&shy;menyerna i navigations&shy;listen från **oophp** nu när det blivit fler menyval, samt skruvat lite på stil&shy;sättningen här och var.


###### Berätta om din syn på Active Record och liknande upplägg. Ser du fördelar och nackdelar?

Den stora fördelen är att det blir enkelt att sköta datalagringen och att man "aldrig" behöver bry sig speciellt mycket om vad som sker under huven -- 
man bara hämtar en post, ändrar den och ber den uppdatera sig själv. Klart och betalt. 
Den stora nackdelen är att upplägget uppenbart bryter mot S:et i SOLID och dessutom medför klara semantiska problem, 
vilka förvärrats ytterligare i Anax&shy;komponentens implementation. Kort sagt, det blir för många genvägar och i längden tappar man både tydlighet och konsekvens i det här sammanhanget. 
Se [forumet](https://dbwebb.se/forum/viewtopic.php?f=59&t=6821) för mer utvecklade tankar i ämnet.

###### Om du vill, och har kunskap om det, kan du även berätta om din syn på ORM och designmönstret Data Mapper som är närbesläktade med Active Record. Du kanske har erfarenhet av liknande upplägg i andra sammanhang?

Ja, jag har stött på och använt dem alla i olika sammanhang. ORM:ar kan vara riktigt bekväma att använda, särskilt i kombination med frågebyggare -- 
och jag lyfter gärna återigen fram LINQ som ett bra exempel på hur kraftfullt ett sådant verktyg kan vara. Stora vinster i form av sparat kodskrivande kan oftast skördas. 
Nackdelen är att man tappar kontroll över kodgenereringen och beroende på hur komplicerade saker man överlåter till verktygen att göra så kan prestandan sjunka drastiskt. 
Här får man som alltid göra en avvägning kring vad som är viktigast.

Jag föredrar *Data Mapper* eller *Repository* framför *Active Record* av ovannämnda anledningar, så det är väl inte så förvånande att jag valde en sådan implementation för mitt data&shy;åtkomst&shy;lager. 
Den ger en mycket bättre semantisk överens&shy;stämmelse med de underliggande data&shy;strukturerna och öppnar upp för ett mer åter&shy;användbart API, 
samt är lättare att testa och konfigurera (särskilt ur DI-synvinkel). What's not to like?

###### Hur gick det att integrera formulär&shy;hantering och databas&shy;hantering i ditt kommentars&shy;system?

Detta gjorde jag i flera steg, där skapandet av databas&shy;tabellerna var först ut. Eftersom jag som nämnts tidigare redan hade en rätt klar bild av hur dessa skulle se ut var det inga problem, 
så efter att bokexemplet var klart (se ovan) gav jag mig på databas&shy;kopplingen för användar&shy;komponenten. Detta var inte särskilt svårt, utan det handlade mest om att byta ut sessions&shy;koden 
mot anrop till mitt nya *Repository* för användare istället. Nästa steg blev att integrera formulär&shy;komponenten med registrering och uppdatering av profiler, 
där styrkan i upplägget blev uppenbart -- efter att vissa buggar benats ut fick jag ett smidigt arbetssätt där jag kunde nyttja automatiken i hög grad, 
bland annat genom att återanvända en och samma formulärvy i fyra olika sammanhang (registrering och uppdatering för vanliga användare samt registrering och uppdatering från adminpanelen).

Jag hade sedan tidigare erbjudit möjlighet för anonyma besökare att kommentera genom att skapa (och hämta) användar&shy;poster baserat på namn och e-postadress, 
vilket förutsatte att användar&shy;namns- och lösenords&shy;fälten inte fick vara obligatoriska. 
Jag bestämde mig för att se om jag kunde behålla detta upplägg även med en databas i botten och efter lite speciallösningar för att få med valideringen på noterna gick det bra. 
En administratör kan registrera en sådan anonym användare i efterhand genom att ange användar&shy;namn och lösenord och kopplingarna till tidigare skrivna kommentarer behålls därmed. 
Jag har även infört *soft deletion* för användare, d.v.s. att de inte tas bort på riktigt utan bara markeras som borttagna, vilket `DbRepository` sköter automatiskt 
(med viss handpåläggning i vyerna).

Jag gjorde sedan på motsvarande sätt i kommentars&shy;komponenten vad gäller data&shy;åtkomsten, men på grund av anonymitets&shy;upplägget ovan kändes inte en rak koppling till kommentars&shy;modellen 
passande för det publika formuläret. Istället skapade jag en *vymodell* -- så fick vi med det begreppet också -- med egen validering som jag sedan kunde knyta till en `ModelForm`, 
så jag kunde nyttja automatiken även där. Vymodellen används sedan för att skapa både användare (om nödvändigt) och kommentar, där det återigen är `DbRepository` som tar hand om grovjobbet.

Eftersom man med mitt system kan skriva kommentarer på godtyckliga sidor (där kommentarer är påslagna) fick jag lite bryderier i hur jag skulle hantera anropskedjan. 
Hittills har jag låtit min `CommentController` ta hand om det inskickade formuläret och sedan skicka användaren tillbaka till föregående sidas kommentars&shy;sektion med hjälp av en ankarlänk, 
men nu övervägde jag att göra hela flödet AJAX-baserat istället för endast *in situ*-redigeringen av existerande kommentarer som det är nu. 
Eftersom formulär&shy;komponenten är helt serverbaserad valde jag dock att behålla det tidigare upplägget och sparar kort och gott `ModelForm`-instansen i sessionen i samband med omdirigeringen. 
Detta gjorde att jag fortsatt kunde överlåta all validering och meddelande&shy;hantering till mina existerande komponenter, för att slippa åter&shy;implementera 
stora delar av presentationen på klientsidan.

Slutligen har jag gjort en administrations&shy;panel som också har mycket gemensamt med den/dem i **oophp**, varifrån en inloggad administratör kan hantera både användare och kommentarer. 
Just de sistnämnda blir dock något av ett specialfall i och med att det som sagt inte går att vara säker på *var* den sida som kommentaren är knuten till befinner sig, 
i och med att dessa inte ingår i databasen, så det är förmodligen enklare att sköta sådant "underhåll" direkt på varje sådan sida. Det var i vart fall inga konstigheter i att få till endera avdelningen, 
då de påminner mycket om varandra och alltså nyttjar samma (eller liknande) *Repository*-, formulär- och validerings-API:er, så det gick mest av bara farten att ta med bägge.

###### Utveckla din syn på koden du nu har i ramverket och din kommentars- och användarkod. Hur känns det?

Nu börjar det kännas rätt bra, även om det garanterat finns utvecklings&shy;potential. Jag är särskilt nöjd med upplägget med *Repository*, 
vilket gjorde data&shy;åtkomsten konsekvent och lätt&shy;hanterlig. Å andra (tredje?) sidan blir kodbasen allt mer komplex, med allt fler associationer kors och tvärs, 
så det är med viss bävan jag emotser uppgiften att *bryta ut* en komponent ur nätet...

Något som dock känns aningen sårbart är hanteringen av anonyma användare, d.v.s. att vem som helst kan skriva kommentarer. 
Min valda lösning för detta är alltså att skapa och återanvända "inloggnings&shy;lösa användarkonton" för att kunna utnyttja främmande nyckel-kopplingen på ett konsekvent sätt. 
Den stora nackdelen med detta är, förstås, att det på sikt kan bli många sådana "skuggkonton", särskilt om spamrobotarna hittar formuläret, 
även om filtreringen jag lagt till i administra&shy;törernas listningsvy underlättar en del.

Den "mjuka borttagningen" för registrerade användare har tillkommit för att upprätthålla referens&shy;integritet, men med en `ON DELETE CASCADE`-inställning 
för den främmande nyckeln i kommentars&shy;tabellen skulle man kunna införa möjlighet att ta bort anonyma användarposter permanent. Samtidigt vill man (förmodligen) 
inte urskillnings&shy;löst rensa ut kommentarer som skrivits i god tro av någon som råkat välja samma namn som en som misskött sig, 
eller dölja namnet hos en anonym skribent vid mjuk borttagning, så en tredje möjlighet skulle vara att lagra namn och e-post direkt i kommentars&shy;tabellen. 
Detta skulle dock medföra behov av att antingen synka dessa när en registrerad användare uppdaterar sin profil (jobbigt), 
eller låta både dessa fält och själva nyckeln vara icke-obligatoriska och hämta värdena från användar&shy;tabellen istället när det finns en främmande nyckel (bättre).

Det finns alltså en del att fundera på här, men tills vidare har jag åtminstone infört möjligheten att slå av och på anonyma kommentarer i kommentars&shy;tjänstens konfigurations&shy;fil.

###### Vad tror du om begreppet "scaffolding"? Kan det vara något att kika mer på?

Inte för att låta som en total MS-apologet, men även detta förekommer i stor utsträckning i .NET-utveckling och sparar mycket tid, särskilt när det kommer till Entity Framework-modeller. 
Nu är det ju inte alltid som man vill ha allt lull-lull som någon annan tycker borde ingå i en sådan fördefinierad "klump" -- 
och det finns en hel del krimskrams i .NET:s mallar som man gör gott i att skala bort -- men det är ofta mindre tidskrävande att "backa" 
från en något överambitiös implementation än att skriva allt från grunden på egen hand.

Detta förutsätter förstås att de mallar som finns att tillgå är något sånär överensstämmande med det man försöker uppnå, 
vilket som sagt inte gällde för mig i detta kursmoment. Därmed fick jag skriva all (eller nästan all) kod själv istället, men det var också ett medvetet val i det här fallet.


Kmom05  {#kmom05.anchor}
------

Som framgår av tidigare redovisning insåg jag redan tidigt att det skulle bli svårt att avgränsa kommentars&shy;systemet på ett bra sätt, 
för att kunna lyfta ut det till en egen, självständig modul. Efter att ha frågat om saken [i forumet](https://dbwebb.se/forum/viewtopic.php?f=59&t=6845) 
bestämde jag mig därför för att lyfta ut *Repository*-komponenten istället, vilken har den stora fördelen att den endast beror av databas&shy;komponenten och inget mer; 
den är inte sammanflätad med det övriga ramverket -- varken det allmänna eller mina egna tillägg -- och saknar både router, vyer och kontroller.

För att upprätthålla självständigheten valde jag att *inte* ta med min `RepositoryService`, eftersom denna *är* knuten till ramverket på olika sätt, 
och den utgör dessutom ett specifikt användnings&shy;fall av modulens funktionalitet som andra inte nödvändigtvis vill anamma. 
Den resulterande modulen är därför enkel och tydligt avgränsad, så är det upp till var och en hur man använder den. 
Jag har även lagt till modulens dokumentation (*README.md*) som en sida under rubriken *Uppgifter* på me-sidan, 
i och med att det ändå rör sig om Markdown och därmed enkelt passar in som innehåll.

I övrigt har jag här på me-sidan infört det nya arbets&shy;sättet med route&shy;funktioner som returnerar värden samt degraderat `Navbar`-komponenten 
från sin tidigare plats som en tjänst i ramverket till att endast instantieras i standard&shy;layouten, eftersom det ändå bara var där den användes.


###### Hur gick arbetet med att lyfta ut koden ur me-sidan och placera i en egen modul?

Det var inte speciellt svårt i och med att den funktionalitet jag valt som sagt var självständig och väl avgränsad. 
Jag började med att ändra/<wbr>förbättra strukturen lite grann, bl.a. genom att bryta ut främmande nyckel-metoden från `BaseModel` till två *traits*, 
och flyttade sedan över allt till det nya repot. Där fortsatte jag uppdelningen genom att separera `*Soft`-metoderna från `DbRepository` till en ny underklass 
`SoftDbRepository`, vilket blev tydligare och mer i linje med SOLID-I:et (liksom O:et, för den delen), och justerade/<wbr>utökade lite fler saker här och var i koden.

Observera att koden för modulen ligger i *me/repository* och inte *me/comment*, av uppenbara skäl.

###### Flöt det på bra med GitHub och kopplingen till Packagist?

Inga problem alls; allt fungerade på första försöket utan vare sig väntetider eller bakslag.

###### Hur gick det att åter installera modulen i din me-sida med Composer? Kunde du följa din installations&shy;manual?

Detta var också enkelt, av samma anledning; någon egen konfiguration eller ingrepp i existerande konfigurations&shy;filer var ju aldrig nödvändigt, 
så så mycket till instruktioner eller följande därav blev det inte. Därefter var det bara att byta ut ett fåtal klassnamn där funktionerna användes, 
liksom att uppdatera vissa metodanrop där jag ändrat signaturen i den nya modulen, sedan fungerade det direkt. Jag använde även tricket med den symboliska länken under utvecklingen -- 
som för övrigt fungerar utmärkt i Cygwin, bara man skriver den rätt -- och installerade den publicerade modulen direkt från Packagist i slutet.

###### Hur väl lyckades du enhetstesta din modul och hur mycket kodtäckning fick du med?

Mycket väl -- efter att ha fått jobba en hel del med att få verktygen att fungera som det var tänkt, eller åtminstone som *jag* ville använda dem i det här fallet. 
Detta var en utmaning eftersom *hela* modulen sysslar med databas&shy;operationer, vilket alltså förutsatte en fungerande databas att testa mot liksom en fungerande metodik för detta.

Efter att ha lusläst hela [kapitel 8](https://phpunit.de/manual/current/en/database.html) i PHPUnits dokumentation satte jag så igång och skapade ett par SQLite-databaser, 
så att upplägget blir portabelt, och gjorde några YAML-filer med exempeldata (blir alltid glad när det erbjuds alternativ till XML). 
Sedan tog det en god stund innan jag fått grund&shy;upplägget att fungera, vilket bl.a. innebar att jag behövde ladda ner och konfigurera `DBUnit`-komponenten 
och "lura" `DatabaseQueryBuilder` att hitta den konfigurations&shy;fil som jag ville använda, men när allt väl var på plats var det enkelt att skapa testfallen.

Jag tog en metod i taget och såg till att täcka in alla former av anrop, t.ex. att skicka in selektions&shy;villkor och definiera ett eget primärnyckel&shy;namn 
(annat än standard&shy;fallets `id`), och kunde därmed stadigt öka kodtäckningen. Så småningom nådde jag upp i 
[__100&nbsp;%__](http://www.student.bth.se/~kabc16/dbwebb-kurser/ramverk1/me/repository/build/coverage/) 
(14 test, 98 kontroller) och har utöver att ha nått samtliga kodvägar alltså även testat om inte alla så de flesta sätt som modulen kan användas på.

###### Några reflektioner över skillnaden med och utan modul?

På grund av tidigare nämnda omständigheter är det i princip ingen skillnad alls, förutom att modulen ifråga från och med nu lever sitt eget liv och inte är knuten till just den här me-sidan, 
eller just min installation av Anax. Det i sig är å andra sidan väl värt att understryka och det känns betydligt roligare att sätta mitt namn under något som någon annan potentiellt kan finna användbart 
snarare än att det bara blev en akademisk övning utan praktisk användning av det hela. Jag ser även många utvecklings&shy;möjligheter, 
vilka blir lättare att realisera nu när kodbasen är fristående, och jag skulle inte alls bli förvånad om jag använder modulen i uppgraderad form i projektet sedan.



Kmom06  {#kmom06.anchor}
------

Ja, det här gick riktigt smidigt det -- större delen av kurs&shy;momentet klart på en halv kväll!

Inför integrationen med de externa tjänsterna uppdaterade jag koden i modulen så att den skapar test&shy;databaserna på nytt vid varje körning med hjälp av SQL-skript, 
så att jag kunde exkludera SQLite-filerna från repot, vilket ger en renare historik då dessa filer av nödvändighet modifieras av testserien. 
Jag valde denna lösning framför databaser i minnet för att slippa problem med delad åtkomst, i och med att det är två olika delar som pratar med databasen samtidigt 
(komponenten som testas och PHPUnit som verifierar resultaten mot faktiska data). Detta visade sig betydligt enklare än befarat, så det blev ju riktigt bra till slut.

Modulens beroenden har även fått ett bättre upplägg, där *anax/common* krävs för testen men inte för att installera modulen som sådan. 
Rent strikt beror den faktiskt inte av *anax/database* heller, utan det räcker att det finns *någon* klass som implementerar samma publika API som `DatabaseQueryBuilder`, 
men för enkelhetens skull har jag låtit det beroendet kvarstå.

Utöver detta har jag som sagt en del tankar på hur modulen kan utvecklas vidare, men eftersom jag har en del annat att stå i för tillfället får det bli en senare fråga.


###### Har du någon erfarenhet av automatiserade test och CI sedan tidigare?

Nix, om man nu inte vill räkna det vi gjort hittills i denna kurs liksom i **oophp** eller **oopython**.

###### Hur ser du på begreppen -- bra, onödigt, nödvändigt, tidskrävande?

Tidskrävande, definitivt -- åtminstone att få till allt första gången; därefter rullar det nog på mest av sig själv så länge man inte gör större ingrepp. 
Risken är, som alltid, att man tycker det blir *för* tidskrävande och istället känner att det är bättre att lägga den tiden på att skriva bättre kod från början. 
Samtidigt är det ju skönt att kunna luta sig tillbaka och låta automatiken verifiera att de ändringar man gör inte orsakar några fel eller oförutsedda förändringar i kodens beteende, 
men det förutsätter förstås att man lyckats skapa vettiga testfall som verkligen är kapabla att fånga upp sådana saker.

###### Hur stor kodtäckning lyckades du uppnå i din modul?

Den kvarstår på 100&nbsp;%, vilket känns riktigt bra med tanke på att det som sagt rör sig om databas&shy;operationer för hela slanten. 
Det är också riktigt tillfreds&shy;ställande att hela testkedjan fungerar fullt ut i de externa tjänsterna, utan större handpåläggning (se nedan). 
Att detta gått så bra beror återigen i mångt och mycket på att modulen är så pass fristående som den är, så bara databas&shy;beroendet fixas så är den egentligen inte särskilt svårtestad.

###### Berätta hur det gick att integrera mot de olika externa tjänsterna.

Jag valde att köra på Travis framför Circle både för att den verkade lite mer flexibel och för att den *inte* befinner sig mitt uppe i ett versions&shy;byte. 
När jag sedan gjorde mitt första försök att integrera Travis fungerade det direkt -- och dessutom gick alla test igenom utan anmärkning. "Titta vad bra det fungerar ibland", 
för att citera *mos*.

För Scrutinizer sedan löste jag [problemet med PHPUnit](https://dbwebb.se/forum/viewtopic.php?f=59&t=6888) genom att lägga till ett förberedelse&shy;kommando i *.scrutinizer.yml* -- 
och även i det här fallet gick allt (något oväntat) igenom på första försöket. Plötsligt händer det, liksom. Än mer kul var att kodkvaliteten fick en 10:a på en gång, 
vilket också kändes oväntat, men det är väl bara att tacka och ta emot. Det fanns dock några anmärkningar, där de flesta hade med felaktiga *docblock* i *anax/database* 
att göra och därmed ligger utanför min kontroll, men en av dem var en riktig bugg som jag missat. 
Den påverkade visserligen inte kodens funktion men utgjorde ändå ett verkligt fel som det var lika bra att åtgärda på en gång. Utdelning direkt, liksom.

###### Vilken extern tjänst uppskattade du mest, eller har du förslag på ytterligare externa tjänster att använda?

Scrutinizer, då den ger mer kött på benen och alltså lyckades hitta ett misstag som annars kanske skulle blivit kvar länge. Har tittat lite översiktligt på en del andra liknande tjänster, 
men inte hittat någon som kändes bättre eller enklare att hantera.



Kmom10  {#kmom10.anchor}
------

Min tappning av temat blev "Allt om sci-fi", vilket borde(?) vara hemmaplan för många programmerare. Stilsättningen är därför rymd- och framtids&shy;inspirerad, 
men jag har iakttagit viss återhåll&shy;samhet för att inte sväva iväg alltför mycket -- det skall ju gå att använda webbplatsen på ett vettigt sätt också. 
Alla delar är noggrant responsiviserade och layouten bygger på flexbox, med några specialtrick för att få allt att se OK ut i alla storlekar.

Jag utgick föga förvånande i hög grad från koden i den existerande Anax-installationen jag arbetat med hittills, men tog också chansen att göra om vissa saker. 
Till exempel är koden nu organiserad efter roll snarare än domän, vilket jag tycker ger ett mer samlat intryck och det blir inte så många kataloger att hålla reda på. 
Jag har även gjort en del andra uppdateringar/<wbr>förbättringar på sina håll, mycket i syfte -- som alltid -- att generelisera och återanvända.

För datahantering använder jag dels en uppdaterad version av min *Repository*-komponent (se krav 6) och dels min tidigare `ModelForm` för databindning, 
vilket sparat mycket tid och fungerat fint. Skönt när man kan stå på sina egna axlar på det sättet...


###### Krav 1--3: Grunden

Användar&shy;hanteringen är mer eller mindre likadan som tidigare i kursen, bara det att det är lite andra datapunkter här och att det inte finns något stöd för anonyma användare. 
Som besökare kan man läsa allt innehåll men man måste logga in för att skriva något. 
Försöker man nå en låst funktion hamnar man på inloggnings&shy;sidan och slussas sedan vidare till den begärda destinationen så fort man loggat in.

Frågorna, svaren och kommentarerna presenteras på ett sätt som utgår från SO, men med ett eget upplägg som bl.a. nyttjar [Fontello](http://fontello.com/)-ikoner på väl valda platser. 
Framtoningen är också överlag mindre avskalad än på SO, vilket är ett medvetet val; det är ju roligt att leka med färg och form, så... 
Listnings&shy;vyerna visar ett mindre urval av information så får man klicka sig vidare för att se mer, vilket även har med databas&shy;prestanda att göra -- 
ju färre operationer jag behöver göra desto bättre, men i flera fall finns inget val då det är många kopplingar, så det rör sig om en rätt databas&shy;intensiv applikation.

När det kommer till just databasen kom jag snabbt fram till att de tre företeelserna fråga, svar och kommentar egentligen bara är tre sidor av samma sak, nämligen *inlägg*. 
Jag bestämde mig därför att slå samman dessa till en allmän entitet `Post` vilken representeras av en basmodell&shy;klass med tre underklasser. 
Med detta upplägg kunde jag använda basklassen för databas&shy;kommunikationen med hjälp av *Repository*-modulen men samtidigt nyttja underklassernas mer specifika validerings&shy;regler 
för formulär&shy;bindningen. Priset blev ett par fält som kan vara `NULL` för vissa inläggs&shy;typer, såsom `title` och `parentId` -- en fråga har ingen förälder, 
medan ett svar har en fråga som förälder och en kommentar är barn till antingen en fråga *eller* ett svar.

Den tekniska delen av detta utgjorde inga större problem, men det blev en del pillande med att få till kontrollerna och vyerna, 
med en hel del `if`-satser som kollar inläggstyp. Jag tror dock att jag i slutändan vunnit på sammanslagningen, då den ledde till en enklare databas&shy;modell 
och en mer rättfram intern struktur och hantering.

Jag nyttjar även undervyer i stor utsträckning, d.v.s. att en vy kan kalla på en annan vy med skräddarsydda data, 
vilket underlättade hanteringen av de olika inläggs&shy;typerna ordentligt då många saker är gemensamma för dessa. 
Även listningarna och formulären återkommer på flera ställen, så med några villkor i utskrifterna var det enkelt att bara kunna slänga in dessa på fler ställen utan vidare.

Ett annat tydligt exempel på detta är administrations&shy;systemet, som påminner starkt om det som finns i kursens eget Anax, vilket i stor utsträckning nyttjar samma vyer som de publika delarna. 
Användare och inlägg tas bort genom flaggning, medan taggar raderas permanent, och tabellvyerna tillåter filtrering på inläggs&shy;status. 
Man kan dock inte lägga till nya inlägg från adminpanelen, utan detta får man göra i det publika gränssnittet, 
där man även som administratör har tillgång till redigerings&shy;funktionen för samtliga inlägg -- annars syns den knappen endast för den användare som skrivit inlägget.

Jag funderade en del på hur jag bäst skulle hantera formulären för att skriva inlägg -- det bästa för användaren tänkte jag borde vara att ha dem direkt i läsvyn, 
på samma sätt som på en SO-frågesida, men för att kunna nyttja databindningen på servern på ett fullgott sätt utan att behöva bygga ett AJAX-system för det 
(vilket i och för sig skulle vara intressant, men det fanns det inte tid för) skulle de passa bättre som egna vyer med egna kontroll&shy;metoder. 
Det fick istället bli en slags kompromiss av forumstuk, där skrivvyn även visar det inlägg man svarar på (förutom frågor som inte har någon förälder), 
där jag återigen kunde använda delvyerna ovan. Varje sådan formulärvy har en tillbaka&shy;knapp som skickar tillbaka användaren till rätt ställe med hjälp av en ankarlänk, 
vilket jag gjorde extra tydligt med ett litet skript som utlöser en enkel CSS-animation som markerar inlägget ifråga, vilket kan vara bra när det inte hamnar längst upp i fönstret.

För både framsidan och användar- och taggvyerna krävdes det mer komplicerade databasfrågor med `JOIN`-satser, 
eftersom selektionen behöver ske på attribut i andra tabeller, vilket varken *Active Record* eller *Repository*-modulen klarar av. 
Eftersom det skulle bli mig övermäktigt att implementera stöd för sådant på en lägre nivå kröp jag istället till korset och snickrade ihop frågorna för hand, 
fast med hjälp av `DatabaseQueryBuilder`, och fick leva med att resultaten faller utanför det robusta modellsystem jag annars kunde nyttja med sådan framgång (se krav 6). 
Jag gjorde dock vad jag kunde för att hålla domänerna någorlunda intakta och instantierar modellobjekt manuellt, men i fallet med frågor skapade jag en utökad vymodell istället (`PostVM`). 
Det fick vara gott nog den här gången.

När det kommer till de externa tjänsterna var det återigen inga problem att få dem att rulla -- och liksom sist gick allt igenom på första försöket, 
fast utan enhetstest nu då. En kommentar kring resultatet på Scrutinizer är att det är fullt av *"false positives"*, 
då väldigt många av anmärkningarna har sin grund i att verktyget (av nödvändighet) inte har hela sammanahanget klart för sig. Det rör sig alltså inte om egentliga fel som sådana, 
men jag har ändå lagt lite tid på att rätta till några mer uppenbara brister såsom att bryta upp den tidigare smått enorma `AdminController` i flera klasser. 
Sammantaget känner jag mig rätt nöjd med slutpoängen för ett projekt av den här storleken.

###### Krav 4: Frågor

Att ett svar är accepterat eller inte hanteras med det allmänna attributet `status` i min `Post`-entitet. 
När man accepterar ett svar "nollas" först det eventuellt tidigare accepterade svaret och sedan sätts ett nytt värde på `status` för det aktuella svaret, 
samtidigt som den motsvarande frågans `status` markeras som besvarad. Dessa värden är strängkonstanter i respektive modellklass och jag har dessutom infört `is*`-metoder i `Post` 
för att enkelt kunna avgöra saken utan att behöva känna till och specificera vad som faktiskt står i databas&shy;fältet i anropande kod. 
Man kan även dra tillbaka en "accepterat"-markering utan att acceptera ett nytt svar och allt sköts i båda fallen av `PostService`.

För röstning har jag två knappar invid varje inlägg: en tumme upp och en tumme ner. Rösterna sparas som egna databasposter för spårbarhetens skull, 
men ett inläggs poäng (rang) uppdateras även direkt i `Post`-entitetens attribut `rank`. Jag har gjort på detta sätt för att slippa ställa fler databas&shy;frågor för att få reda på poängen, 
så det enda jag behöver göra i gengäld är att se till att båda entiteterna uppdateras samtidigt när en förändring sker -- och återigen ligger detta ansvar på `PostService`. 
När man avlagt en röst visas endast den ikon som motsvarar den valda riktningen och man kan inte rösta på samma inlägg igen, 
men däremot kan man dra tillbaka en tidigare avlagd röst och därefter är det fritt fram att rösta igen. Man kan inte rösta på sina egna inlägg.

Knappen för att acceptera svar visas endast för svar på frågor man själv skrivit och knapparna för röstning visas endast för inloggade användare. 
I båda fallen sker kontroller på servern så att det endast är de användare som är behöriga att påverka saker och ting som också får göra det. 
Sorteringen av svar i frågevyn sker genom att inställningar skickas in till *Repository*-komponentens selektions&shy;metoder, som sköter resten.

###### Krav 5: Användare

Det här kändes som ett rätt enkelt krav då det mest bara handlade om att summera saker och snickra ihop rätt databas&shy;operationer. 
Här hade jag även stor nytta av min nya *Repository*-komponent (se nedan), som löste referenserna galant.

Min algoritm för beräknandet av ryktet är enkel: en fråga är värd 2 poäng, ett svar 3 poäng, ett accepterat svar 5 poäng och en kommentar 1 poäng. 
Varje sådan siffra multipliceras sedan med inläggets röstpoäng (rang), fast med en förskjutning åt den positiva sidan så att +1 blir gånger 2, +2 blir gånger 3 o.s.v. 
Har inlägget 0 röstpoäng (vilket inte nödvändigtvis betyder att det inte har några röster, utan bara att summan av alla röster är 0) tas inläggs&shy;poängen som den är. 
Alla dessa poäng summeras sedan och sätts till användarens rykte, vilket sköts av en metod i min `UserService`.

###### Krav 6: Repository

Jag valde i ett tidigt skede (innan projektet tillkännagavs) att fortsätta utveckla min [*Repository*-modul](https://packagist.org/packages/lrc-se/anax-repository), 
så det passar bra att låta detta sortera under det sista kravet. Specifikt ville jag hitta ett smidigt (smidigare) sätt att hantera främmande nyckel-kopplingar, som en riktig ORM, 
så jag började fundera över hur detta kunde låta sig göras. Efter många idéer och en del snabba försök siktade jag in mig på två olika, kompletterande tillväga&shy;gångssätt, 
som båda utnyttjar samma bas.

Denna bas består i en ny klass `RepositoryManager`, med flera därtill hörande kod&shy;komponenter. Grund&shy;upplägget handlar om att det finns en (1) *hanterare* 
som basar över alla samlingar i applikationen, vilka registreras på grundval av modellklass, så att det genom DI-tekniker alltid går att få tillgång till den samling som innehåller en viss typ av modell. 
Genom att deklarera referenser i modellerna -- vilka attribut som utgör främmande nycklar och vilka andra modeller (modellklasser) de refererar till -- 
kan dessa modeller sedan automagiskt med hjälp av den injicerade samlings&shy;hanteraren hämta och instantiera motsvarande objekt utan att den behöver veta någonting om databas&shy;kopplingen som sådan.

Det första tillväga&shy;gångssättet utför sådana hämtningar på begäran, där objektet hämtas från databasen när man anropar modellens `getReference`-metod 
med en deklarerad referens namn som parameter. I deklarationen kan man även välja att en referens skall vara "magisk", vilket innebär att modellen använder `__get()` 
för att försöka hämta motsvarande referens. Med andra ord är <code>$model-&gt;<wbr>getReference('foo')</code> ekvivalent med `$model->foo` i dessa fall, 
vilket underlättar för den anropande koden.

Det andra sättet, som är betydligt mer komplicerat, går ut på att hämta alla eller vissa referenser i en (1) operation, istället för att varje hämtning utgör en egen fråga. 
Detta har stor påverkan på prestandan i större sammahang där man vill få ut längre listor av träffar, vilket är fallet i det här projektet, 
så en sådan funktion var något jag ville få till. För att få detta till stånd byggde jag en egen frågebyggare uppepå *anax/database* dito, 
som utgår ifrån de deklarerade referenserna och sätter ihop en mer eller mindre komplicerad `JOIN`-sats med alias för alla främmande attribut samt använder sig av prefix, 
så att både databas&shy;motorn och modulen kan hålla isär vilka attribut som hör till vilken modell.

När resultatet hämtats bryter modulen sedan upp det och instantierar modellklasser, återigen utgående från referens&shy;deklarationerna i varje modell, 
samt skapar nya publika attribut som lagrar de refererade objekten i huvudmodellen. Alla instantierade modeller injiceras dessutom med `RepositoryManager`-referensen, om de kan ta emot den, 
så de blir en del av systemet. Denna referens&shy;hämtning slås på och av genom metoden `fetchReferences()` och gäller en selektions&shy;operation åt gången (den följande), 
vilket hanteras med ett privat attribut. Om metoden anropas utan argument hämtas alla referenser, men man kan även skicka in en lista på de referenser som skall hämtas om man inte behöver alla. 
Slutligen kan man även ställa in hämtningen att ta hänsyn till *"soft-deletion"* enligt tidigare definition, vilket lägger till fler villkor i `JOIN`-satsen. 
Allt detta sköts alltså helt automatiskt och efter att ha tittat på hur de genererade SQL-frågorna ser ut är jag glad att jag slapp skriva dem för hand...

Hela systemet har fungerat oförskämt bra och jag har lyckats bibehålla 100&nbsp;% kodtäckning i modulens testsvit, vilket dock krävde en del handpåläggning för att hantera samtidig databas&shy;åtkomst. 
Det har även underlättat arbetet med projektet ordentligt då jag nu kan skriva saker som <code>$question-><wbr>user-><wbr>username</code> 
utan vidare och överlåta till underliggande komponenter att sköta data&shy;åtkomsten i bakgrunden. 
Det återstår dock en hel del arbete för att modulen skall bli allmängiltig på allvar, då det t.ex. saknas lokal cachning och det inte finns något bra sätt att göra *andra* `JOIN`-operationer 
med bibehållen referens&shy;hämtning, som alltså behövdes för vissa av vyerna enligt ovan, så jag har fått en ny respekt för det arbete som ligger bakom existerande ORM:ar.

Titta i modulens README för mer information om hur den nya funktionaliteten kan användas.

###### Allmänt om projektet

Det var för lite tid, det är bara att konstatera. Problemet är återkommande så här års i och med läsperiodernas upplägg, så något borde göras åt det. 
Specifikt i det här fallet är det trots en till synes "enkel" uppgifts&shy;formulering många saker som skall samverka och det är mycket kod som behöver skrivas, 
särskilt om man vill göra något som ser något sånär vettigt ut -- och dessutom är responsivt, vilket måste anses vara ett grundkrav nuförtiden.

En annan sak som påverkar är att de verktyg som introducerats i kursen bara delvis passar med uppgiften. Jag har tidigare uttryckt kritik mot *Active Record*, 
i synnerhet i Anax' implementation, och precis som blev fallet med min egen modul så löser inte heller den komponenten problemet med att hämta och korrelera data från flera tabeller -- 
om något blir den semantiska passningen ännu sämre och specialiseringen ännu större.

Mycken tid och kraft har gått till att säkerställa att alla funktioner leder rätt ifråga om sökvägar och returlänkar, 
med tillhörande kontroller av behörighet och status (t.ex. att man inte kan acceptera ett svar på en fråga man inte själv skrivit). 
Att få till och utnyttja återanvändbara vyer och funktioner var en annan stor post, särskilt när det kom till just `Post` (inlägg), 
liksom att få till stilsättningen och inte minst responsiviteten. Grundupplägget har dock hållit hela vägen ut, vilket kändes bra.

På grund av tidsbristen finns det flera saker som jag skulle velat göra, men som jag helt enkelt inte hann med. 
En sådan sak är paginering av listvyerna, som nu saknas helt och hållet, så på sikt blir det långa sidor där då det inte finns någon begränsning. 
Grunden är dock lagd med (numera) fullständiga inställnings&shy;möjligheter för `ORDER BY`, `LIMIT` och `OFFSET` i *Repository*-modulen, 
så det handlar mest om att få in det i kontrollerna och presentations&shy;lagret på ett bra sätt. En annan sak är sortering av dels listvyerna och dels tabellerna i adminpanelen à la **oophp**, 
vilket i princip rör sig om samma sak. Eventuellt kunde dessa saker lösas via AJAX, som jag gjorde i [**oophp**-projektet](http://www.student.bth.se/~kabc16/dbwebb-kurser/oophp/me/kmom10/htdocs/), 
men det fick också stryka på foten. Ytterligare vygeneralisering skulle också låta sig göras.

Och så vidare. Nåväl, en annan dag kanske...

###### Kursutvärdering

Kursen har gett ett blandat intryck. Å ena sidan har det känts lite blasé att göra ytterligare en variant av Anax -- det börjar bli en hel hög nu -- 
medan det å den andra introducerats nyttiga koncept och tekniker. Just det att refaktorisera sin kod är också nyttigt (men jobbigt), 
även om detta kunde underlättats en del med tydligare riktlinjer om vart man är på väg. Å tredje sidan är det väl mer verklighets&shy;troget att man *inte* vet det fullt ut, 
så det är bra att träna på oförutsedda omskrivningar också.

Kmom04 blev som bekant något i hästväg för mig då jag inte ville använda de färdiga lösningar som erbjöds av tidigare nämnda skäl, 
men det är värt att upprepa att dessa komponenter *uppenbart* bryter mot de principer och riktlinjer som annars förs fram som viktiga i kursen. 
Detta är en klar brist som behöver åtgärdas till nästa omgång, eftersom det annars blir motsägelsefullt -- vad är det egentligen som är viktigt? Och *hur* viktigt är det?

Den s.k. kommentars&shy;modulen känner jag mig också tveksam till som sådan, vilket var en av anledningarna till att jag valde att lyfta ut *Repository*-komponenten istället. 
Detta berodde som nämnts i mångt och mycket på att det systemet är svårt att avgränsa och testa, för att inte tala om hur svårt det är att få till ett paket som blir allmän&shy;giltigt och *inte* 
mer eller mindre hårt knutet till ens egen Anax-installation. Därmed blir det även svårt att återanvända den modulen i projektet -- eller jag föreställer mig i alla fall att det *skulle* 
varit det om jag nu följt det spåret. *Repository*-modulen passade tvärtom perfekt för syftet och var bara att plocka in som den var (efter uppdatering enligt ovan).

Så, för att sammanfatta: en hel del bra, men alla bitar passar inte ihop och den utstakade vägen skapar minst lika många problem som den löser. Översyn behövs.

__Betyg:__ 7/10
