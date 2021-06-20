# Протокол HTTP
Протокол HTTP используется для передачи данных между сервером и клиентом.

Также как и люди, компьютеры общаются между собой с помощью специального языка, он называется **Hyper Text Transport Protocol (протокол передачи гипертекста)**.

Например, если вы переходите по ссылке [https://google.com/](https://google.com), то вы отправляете запрос на сервер Google, где указываете, что хотите получить главную страницу Google (по принципу, вы ничего не указываете, вы просто вводите URL (*URL - Uniform Resource Locator (унифицированный указатель ресурса)*) google.com). После того как вы нажали Enter введя адрес, который принадлежит серверу, сервер принимает от вас пакеты данных, где указано кто вы такой, откуда посылаете данные и так далее, в ответ же, сервер отдаёт вам нужную информацию.

> Пару слов о клиент-серверной архитектуре: HTTP предполагает, что клиент (компьютер с которого сидит юзер) будет общаться с сервером (удаленная информационная система). Поэтому далее клиент - ПК пользователя, а сервер - удаленный ПК с нужными пользователю данными.

Сам запрос HTTP выглядит как-то так:
```http
HTTP/1.1 200 OK
Server: nginx/1.0.15
Cache-Control: no-cache,no-store,max-age=0,must-revalidate
Content-Type: text/html; charset=UTF-8
Date: Sun, 20 Jun 2021 15:02:01 GMT
Last-Modified: Sun, 20 Jun 2021 15:02:01 GMT
Content-Encoding: gzip
Expires: Sun, 20 Jun 2021 15:02:01 GMT
Connection: Keep-Alive
Accept-Ranges: bytes

<!DOCTYPE html><html class="i-ua_js_no i-ua_css_standart i-ua_browser_unknown i-ua_browser-engine_unknown i-ua_browser_desktop i-ua_platform_windows" lang="ru"><head xmlns:og="http://ogp.me/ns#"><meta http-equiv='Content-Type' content='text/html;charset=UTF-8'><meta http-equiv='X-UA-Compatible' content='IE=edge'><title>Яндекс</title><link rel="shortcut icon" href="//yastatic.net/">
...
```

* Первая часть файла (до пустой строки) называется *заголовком HTTP*.
* Вторая часть файла (начинается с `<!DOCTYPE html>`) является *телом запроса HTTP*.


## GET/
Если мы посмотрим на отправленные серверу запросы, то они будут выглядеть как-то так:

```http
GET / HTTP/1.1
Host: ya.ru
User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,"/";q=0.8
Accept-Encoding: gzip,deflate
Accept-Language: en-US, en; q=0.5
Connection: Keep-Alive
```

На первый взгляд ничего не понятно.. Давайте рассмотрим этот запрос поближе, так как если мы поймем его, то сможем скорее всего понять и ответ сервера (или предопределить каким будет ответ сервера).

Для начала стоит сказать что информация вверху - мета-информация. Она не видна пользователю просто так, она используется только браузером и сервером, для того чтобы понять что, зачем и откуда приходит. Данная информация есть *у каждого запроса* и называется **заголовком HTTP**.

Пройдемся построчно по запросу:

1. Строка говорит нам о *методе HTTP*. Метод указывает на основную операцию, которую мы хотим проделать. В данном случае "Get" (получить) означает что мы хотим получить какую-то информацию от сервера. Также через "/" указан протокол, с помощью которого мы хотим связаться с сервером (HTTP/1.1). Как вы уже догадались "1.1" - версия протокола.
2. `Host` указывает на значение адреса, к которому обращается клиент (адрес сервера).
3. `User-Agent` - софт, с которого сидит пользователь
4. `Accept` - тип данных, который пользователь ожидает получить
5. `Accept-Encoding` - список форматов сжатия, которые поддерживает клиент
6. `Connection` - тип соединения. В стандарте HTTP/2.0 игнорируется, из-за потенциальной опасности, поэтому мы тоже его проигнорируем.

Как вы видите в целом в запросе пользователя серверу указана информация о пользователе, а также что именно мы хотим получить.

GET/ используется для того, чтобы получить какие-то данные, поэтому логично рассчитывать на то, что сервер отправит нам ответ. Ответ сервера будет выглядеть как-то так:
```http
HTTP/1.1 200 OK
Server: nginx/1.0.15
Cache-Control: no-cache,no-store,max-age=0,must-revalidate
Content-Type: text/html; charset=UTF-8
Date: Sun, 20 Jun 2021 15:02:01 GMT
Last-Modified: Sun, 20 Jun 2021 15:02:01 GMT
Content-Encoding: gzip
Expires: Sun, 20 Jun 2021 15:02:01 GMT
Connection: Keep-Alive
Accept-Ranges: bytes

<!DOCTYPE html><html class="i-ua_js_no i-ua_css_standart i-ua_browser_unknown i-ua_browser-engine_unknown i-ua_browser_desktop i-ua_platform_windows" lang="ru"><head xmlns:og="http://ogp.me/ns#"><meta http-equiv='Content-Type' content='text/html;charset=UTF-8'><meta http-equiv='X-UA-Compatible' content='IE=edge'><title>Яндекс</title><link rel="shortcut icon" href="//yastatic.net/">
...
```

Информации тут явно больше, даже не смотря на то, что кое-что я не включил в данный запрос (кастомные элементы заголовков), в целом сейчас это вообще нас не должно беспокоить.

1. 200 - код, когда запрос был успешно обработан и принят
2. `Server` указывает на сервер, который ответил на запрос клиента. В данном случае это nginx.
3. `Cache-Control` - заголовок, который используется для задания инструкций кеширования для запросов и ответов
4. `Content-Type` в данном случае говорит о том, какой тип данных был получен
5. `Date` - дата формирования ответа
6. `Last-Modified` - дата, когда нужный клиенту ресурс (файл) был изменен
7. `Content-Encoding` говорит о том, в каком формате сжатия был прислан ответ
8. `Expires` - заголовок, который указывает на то, когда кэш присланного ответа будет недействителен
9. `Connection` - тип соединения
10. `Accept-Ranges` - маркер того, что ответ или запрос может быть прислан по кускам. Значение данного заголовка - единицы информации, в которых будут измеряться "куски".
11. Последняя строчка содержит сам контент, который прислал сервер. Его браузер и будет выводить.

Теперь, когда мы поговорили о том, как именно общаются между собой клиент и сервер, необходимо пообщаться о методе, который они использовали - **GET**.

*GET* используется для того, чтобы получить информацию, указанную в URI (URI - Unified Resource Identifier (*унифицированный идентификатор ресурса*), не путайте с указателем ресурса (URL)). Отличить что такое URL, URN (Unified Resouce Name (унифицированное имя ресурса)) и URI можно с помощью следующего примера:

* **URI**: example.com/image1.jpg
* **URL**: example.com
* **URN**: image1.jpg

<p align="center">>URI = URL + URN</p>

Синтаксис GET:

```
GET URI
Host: example.com
```

Например:
```http
GET /image1.jpg
Host: example.com
```

Запросит файл по адресу: `example.com/image1.jpg`

> Интересно, что если файл image1.jpg будет очень большой, то он не придёт одним ответом. Ответ (один огромный файл) разделится на несколько подфайлов (HTTP-ответов), которые будут называться *пакетами*. Количество пакетов, которое будет нужно для того, чтобы воссоздать на ПК клиента необходимый файл будет указано в заголовке `Accept-Ranges`.

## POST/
POST - ещё один метод HTTP, который используется для того, чтобы отправить серверу какую-то информацию для обработки.
Самое простое использование POST - форма для входа в систему.

Пример (a):
```Text
POST /login.php HTTP/1.1
Content-Type: application/x-www-form-urlencoded
Content-Length: 40

user=admin&password=testing&commit=login
```

GET тоже может отправить какие-либо данные на сервер с помощью адресной строки (по сути, при использовании GET мы указываем определенные параметры в адресной строке, чтобы получить определенный ответ. Это не годится тогда, когда данные должны быть засекречены, ибо передача данных через адресную строку это небезопасно). Вы наверняка видели GET запросы, в которых у URN были добавлены параметры после знака "?".

Пример:
```http
https://www.google.com/search?q=Hello&sxsrf=ALeKk03Jk5Jp0hvqMhm6WSuzIMd6v4qTcw%3A162421298250...
```

Тут мы видим, что в URN после *search* идёт знак вопроса и передаются атрибуты (*синтаксис: название_аттрибута=значение&следующее_название_аттрибута=значение*).

В методе POST атрибуты передаются не в адресной строке, а в самом теле запроса HTTP, что делает этот метод более безопасным.

Как можно было видеть в примере *(a)* данные передаются прямо в теле HTTP-запроса.

# Работа с curl
**Curl** - утилита для взаимодействия с серверами с помощью командной строки.

В Linux её можно вызвать с помощью команды `curl`, в Windows же она называется `curl.exe` (**не путайте с curl, которая является алиасом для команды Invoke-WebRequest в Powershell**).

## Получение данных
Для того, чтобы получить заголовок ответа веб-сервера нужно ввести:
```powershell
curl.exe -I google.com
```

В данном примере мы посылаем GET запрос серверу под адресом google.com, и ждём от него **не** весь ответ в виде заголовка и тела, а только заголовок HTTP-ответа. Флаг `-I` отвечает за то, чтобы сервер присылал только заголовок ответа.

Если же мы хотим чтобы сервер прислал весь ответ, то стоит использовать следующую команду:

```powershell
curl.exe google.com
```

Думаю, уже ясно что вместо *google.com* можно использовать любой другой адрес сервера.

## Отслеживание запроса HTTP
Отследить запрос можно с помощью специального метода HTTP - **Trace**.

Многие системные администраторы по возможности создают прокси-серверы, которые бы кэшировали нужную информацию по определенному запросу, для того чтобы сервер *не делал одно и то же по миллиону раз*.

**Прокси-сервер** - промежуточный сервер, который передаёт запрос пользователя другому пользователю, программе и выступает посредником между ними. Данный сервер может кэшировать информацию, скрывать первоначального отправителя запроса или переадресовывать трафик для снижения нагрузки на определенный сервер.

Отследить запрос можно с помощью всё той же утилиты curl:
```powershell
curl.exe -X "TRACE" example.com

Вывод:
TRACE / HTTP/1.1
User-Agent: curl/7.55.1 Windows libcurl/7.55.1 WinSSL
Host: example.com
Via: proxy_server.com
Accept: */*
```

TRACE - метод, который по умолчанию многие серверы **не пропускают**, просто потому что злоумышленники могут получить слишком много информации.

## Узнать какие методы HTTP доступны
Как было сказано выше TRACE может использовать не со всеми серверами. Допустим у вас возникла следующая задача: вам нужно узнать на каком из серверов не работает определенный метод HTTP. Узнать какие методы HTTP разрешены на сервере можно с помощью метода *OPTIONS*:

```powershell
curl -X "OPTIONS" google.com

Вывод:
OPTIONS / HTTP/1.1
Date: Sun, 20 Jun 2021 15:02:01 GMT
Server: nginx/1.0.15
Allow: GET, HEAD, OPTIONS, POST, TRACE
Content-Length: 0
Connection: close
Content-Type: text/html; charset=UTF-8
```

В данном заголовке запроса мы видим заголовок под названием Allow, который перечисляет какие именно методы можно присылать серверу.

# Статус-коды HTTP
Статус коды приходят в HTTP-ответе. Они являются трёхзначными числами.

```http
GET / HTTP/1.1 200 OK
```

В данном примере мы получили статус-код **200**.

## Группы статус-кодов
* 100-199 - информационные статус-коды
* 200-299 - статус-коды успешного выполнения запроса
* 300-399 - статус-коды переадресации (а также статус-коды связанные с кэшированием)
* 400-499 - статус-коды ошибки на стороне клиента
* 500-599 - статус-коды ошибки на стороне сервера

Одни из самых популярных статус-кодов:

* 200 - Успешное выполнение запроса
* 404 - Файл не найден
* 301 - Сервер переехал на другой адрес перманентно
* 304 - Файл не был модифицирован (выдается, если в HTTP-запросе был [заголовок-условие](https://developer.mozilla.org/en-US/docs/Web/HTTP/Conditional_requests))
* 401 - Пользователь превысил полномочия и не вошёл в систему
* 403 - Пользователь пытается получить данные, к которым у него нет доступа
* 404 - Пользователь пытается получить несуществующий файл
* 500 - Запрос пользователя является нормальным, однако сервер не смог его обработать по каким-то причинам