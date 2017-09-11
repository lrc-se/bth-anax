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

blubb


Kmom04  {#kmom04.anchor}
------

blubb


Kmom05  {#kmom05.anchor}
------

blubb


Kmom06  {#kmom06.anchor}
------

blubb


Kmom10  {#kmom10.anchor}
------

blubb
