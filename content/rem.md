---
title: "Dokumentation av REM-server"
flash: "img/bg5.jpg"
id: "rem"
comments: true
...

REM-server
==========

Här följer en dokumentation över hur webbplatsens integrerade REM-server fungerar. Servern utgörs av en REST-webbtjänst och alla API-anrop besvaras i JSON-format. 
Som standard finns en uppsättning poster i datamängden `users`, men det är annars fritt fram att skapa och ta bort godtyckliga poster i godtyckliga mängder.


### Visa alla poster

###### Anrop

    GET rem/api/<dataset>

###### Parametrar

    offset      // hur många poster som skall skippas (frivillig)
    limit       // maximalt antal poster (frivillig)

###### Svar

    /* 200 */
    {
        "data",     // lista av poster
        "offset",   // antal skippade poster
        "limit",    // maximalt antal poster i svaret
        "total"     // totalt antal poster i datamängden
    }

Listar alla poster som hör till en viss datamängd. Listan sorteras i stigande ordning på `id`-attributet och kan begränsas med URL-parametrarna.


### Visa en post

###### Anrop

    GET rem/api/<dataset>/<id>

###### Svar

~~~
/* 200 */
{
    // postens interna struktur
}
~~~

~~~
/* 404 */
{
    "error"     // felmeddelande om posten inte hittas
}
~~~

Returnerar en post från en viss datamängd baserat på `id`-attributet.


### Lägg till post

###### Anrop

    POST rem/api/<dataset>

###### Svar

~~~
/* 200 */
{
    // den nya postens interna struktur, inklusive tilldelat ID
}
~~~

~~~
/* 400 */
{
    "error"     // felmeddelande om indatan har ogiltigt format
}
~~~

Skapar en ny post i en viss datamängd. Ange attribut och värden i JSON-format i anropets innehållsdel.


### Uppdatera post

###### Anrop

    PUT rem/api/<dataset>/<id>

###### Svar

~~~
/* 200 */
{
    // den uppdaterade postens interna struktur
}
~~~

~~~
/* 400 */
{
    "error"     // felmeddelande om indatan har ogiltigt format
}
~~~

Uppdaterar en befintlig post i en viss datamängd, eller lägger till en ny om ingen post med angivet ID hittas. Ange attribut och värden i JSON-format i anropets innehållsdel.


### Radera post

###### Anrop

    DELETE rem/api/<dataset>/<id>

###### Svar

~~~
/* 200 */
{
    "message"   // bekräftelsemeddelande
}
~~~

~~~
/* 404 */
{
    "error"     // felmeddelande om posten inte hittas
}
~~~

Raderar en befintlig post i en viss datamängd baserat på ID.


### Återställ standard&shy;värden

###### Anrop

    GET rem/api/init

###### Svar

    /* 200 */
    {
        "message"   // bekräftelsemeddelande
    }

Återställer standard&shy;värden i sessionen från fil.


### Rensa sessionen

###### Anrop

    GET rem/api/destroy

###### Svar

    /* 200 */
    {
        "message"   // bekräftelsemeddelande
    }

Rensar hela sessionen. **OBS! Detta innebär även att en eventuell användar&shy;inloggning rensas!**
