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

Jag gjorde det enkelt för mig denna gång och körde kort och gott `anax`-kommandot direkt från början, för att sedan gå igenom koden och ändra en del saker så att de bättre passar mig. 
Jag kopierade sedan in min existerande navigations&shy;lists&shy;lösning från <strong>oophp</strong>, i förenklad och något modifierad form, 
samt gjorde en liten specialare i grund&shy;layouten för att få den som jag ville ha den den här gången; specifikt genom att lyfta ut <code>H1</code>:an 
till en egen sektion programmatiskt och lägga till stöd för att kunna styra flashbilden genom frontmattern. Som vanligt är allt helt och hållet responsivt också.

I övrigt kändes detta mest som "intet nytt under solen", då det börjar bli många me-sidor nu, så den största utmaningen var egentligen att komma på ett nytt utseende för n:te gången...


###### Gör din egen kunskapsinventering baserat på PHP: The Right Way och berätta om dina styrkor och svagheter som du vill förstärka under det kommande året.

Jag känner rent allmänt att jag behärskar språket och miljön kring PHP väl, då jag jobbat med dessa under lång tid och därmed skaffat mig god erfarenhet om möjligheter, genvägar och fallgropar. 
Med det sagt finns det alltid saker att lära sig och utifrån uppräkningen av tekniker på PHP: The Right Way skulle jag säga att det framför allt är inom *dependency injection*, 
testning och driftsättning/<wbr>virtualisering som jag känner att det saknas en del. Då är det också mycket lämpligt att den här kursen kommer att fokusera på just dessa områden.

###### Vilket blev resultatet från din mini-undersökning om vilka ramverk som för närvarande är mest populära inom PHP?

Den vanligaste bilden, vart man än vänder sig, tycks vara att det är [Laravel](https://laravel.com/) som kniper förstaplatsen med rätt god marginal, 
med främst [Symfony](https://symfony.com/), [CodeIgniter](https://codeigniter.com/), [Yii](http://www.yiiframework.com/), [CakePHP](https://cakephp.org/) och [Zend](https://framework.zend.com/) 
i olika konstellationer därunder. Flera av de senare har många år på nacken vid det här laget, men tydligen gör de något rätt eftersom folk fortsätter att använda dem. 
Andra, speciellt mindre, ramverk dyker också upp i listorna här och var, men i mindre konsekvent omfattning, och inom kretsar som har större fokus på prestanda tycks [Phalcon](https://phalconphp.com/) 
vara det givna valet -- medan det knappt omnämns i andra.

> __Källor:__
> 
> * [__Medium__: Best PHP Frameworks In 2017](https://medium.com/level-up-web/best-php-frameworks-for-web-developers-in-2017-c8a041671a79)
> * [__Archer Software__: Top 7 Best PHP Frameworks for 2017](http://www.archer-soft.com/en/blog/top-7-best-php-frameworks-2017)
> * [__SitePoint__: The State of PHP MVC Frameworks in 2017](https://www.sitepoint.com/the-state-of-php-mvc-frameworks-in-2017/)
> * [__Coders Eye__: 11 Best PHP Frameworks for Modern Web Developers in 2017](https://coderseye.com/best-php-frameworks-for-web-developers/)
> * [__DZone__: Top PHP Frameworks of 2017](https://dzone.com/articles/top-php-frameworks-of-2017)
> * [__Vtrio__: Top 5 PHP Frameworks of 2017](https://www.vtrio.com/blog/top-5-php-frameworks-of-2017/)
> * [__Quora__: What is the best PHP framework 2017?](https://www.quora.com/What-is-the-best-PHP-framework-2017)
> * [__In'saneLab__: Is Laravel the Best PHP Framework in 2017?](https://insanelab.com/blog/web-development/laravel-best-php-framework-2017/)


###### Berätta om din syn/<wbr>erfarenhet generellt kring communities och specifikt communities inom open source- och programmerings&shy;domänen.

Båda positiva och negativa. Det kan vara mycket värt att samverka med folk med vilka man delar kunskap, fokus, intresse och rentav passion, 
då det säkerställer god kommunikation och förståelse vilket i sin tur leder till både god hjälp och gott kamratskap. Dbwebb är ett bra exempel på detta.

Å andra sidan kan det också slå över och bli uteslutande, snobbigt och segregerande, 
inte minst när det bildas faktioner med nästintill vattentäta skott inom något som från början var tänkt att vara *en* gemenskap. 
Tyvärr tycks detta vara särskilt vanligt inom just "open source- och programmerings&shy;domänen", där just PHP som många nog känner till har en... låt oss säga *brokig* historia.

Det senare fallet kan vara svårt att komma tillbaka ifrån och det verkar även avskräckande på nykomlingar som annars skulle vara mycket väl betjänta av att omfattas av det förra. 
Moderation anbefalles alltså.

###### Vad tror du om begreppet “en ramverkslös värld” som framfördes i videon?

Jag tycker det känns som något av en utopi, om än en önskvärd sådan. Grundproblemet är att för att det skall kunna bli verklighet -- 
för att *någonting* som enbart bygger på interface skall kunna bli verklighet -- så måste *alla* vara helt och hållet överens om exakt hur detta interface skall se ut, 
vilket är [tämligen osannolikt](https://xkcd.com/927/). Har man inte en sådan överenskommelse faller hela upplägget och man är tillbaka i starka kopplingar modulerna emellan på nolltid.

Att bryta upp stora, monolitiska kodbaser till förmån för mindre integrerbara komponenter är jag dock helt för, i alla sammanhang, 
men frågan är alltså hur långt detta visar sig praktiskt möjligt att uppnå över tid.

###### Hur gick dina förberedelser inför kommentars&shy;systemet?

Uppgiften och syftet var så vagt formulerade att det inte "gick" särskilt mycket alls, annat än lite allmänna reflektioner över hur främst databas&shy;struktren skulle kunna se ut. 
Någon kod kändes det inte vara någon mening med att skriva än, så jag avvaktar tills det blir tydligare vad det egentligen är som skall göras.


Kmom02  {#kmom02.anchor}
------

blubb


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
