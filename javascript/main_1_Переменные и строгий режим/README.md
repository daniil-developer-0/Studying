# Объявление переменных
Переменные можно объявить с помощью 3 ключевых слов:
* `let`;
* `const`;
* `var` (*устаревший способ*)

## let
Данный способ является основным. Он описан в данной спецификации<sup>[2](https://tc39.es/ecma262/#sec-let-and-const-declarations)</sup>.

```javascript
let variable1 = 100;
let variable2 = 'A String';
let variable3 = {
    'an': 'object'
}
```

## const
Данный способ используется для объявления констант.

```javascript
const constant = 3.14;
```

## var
Устаревший метод инициализации переменных. Поддерживает механизм поднятия переменных<sup>[3](https://www.digitalocean.com/community/tutorials/understanding-hoisting-in-javascript)</sup>.

```javascript
var variable1 = 1;
var variable2 = 'A String';
```

### Hoisting
`var` отличается от других видов инициализации переменных тем, что поддерживает механизм "поднятия".

> Hoisting — это механизм в JavaScript, в котором переменные или объявления функций, передвигаются вверх перед выполнением кода.

```javascript
console.log(`Hello, ${world}`);
var world = 'World';

// Output: Hello, undefined
```

Тот же случай только с `let`:
```javascript
console.log(`Hello, ${world}`);
let world = 'World';

// Error: Uncaught ReferenceError: world is not defined
//    at <anonymous>:1:23
```
Как можно увидеть в случае с `let` JS выкидывает ошибку, а в случае с `var` JS просто возращает значение `undefined` (пер. с англ. - неопределенность).


#### Почему возращается `undefined`?
`var` возращает неопределенность просто потому что передвигается вверх (*"поднимается"*) только **объявление переменной, а не объявление и её значение**.

Если проводить аналогию с `let`, то это все равно если бы мы сделали следующее:
```javascript
let HelloWorld;
console.log(HelloWorld);
HelloWorld = "Hello, World";

// Output: undefined
```

Грубо говоря, компилятор делает следующее:

* **Вот это**:
    ```javascript
    console.log(hello);
    var hello = "Hello!"; 

    // Output: undefined
    ```
* **Превращается в это:**
    ```javascript
    var hello;
    console.log(hello);
    hello = "Hello!";

    // Output: undefined
    ```

# Строгий режим
JS развивается с 1995, с тех пор язык притерпел невероятное количество изменений.

Например, раньше в языке можно было делать вот так:
```javascript
name = "Daniil";
console.log("Hello, " + name);

// Output: Hello, Daniil
```

Кажется что всё правильно, однако где объявление переменной `name`?! Его нет. Раньше такое было нормой, однако сейчас если делать такой *паста-код*, то можно легко запутаться что и где объявляется и что вообще происходит. Для этого в спецификации ECMAScript5<sup>[4](https://262.ecma-international.org/5.1/#sec-14.1)</sup> была добавлена директива (*специальная команда, указывающая компилятору на то, как именно обрабатывать код при компиляции*) `use strict`, которая включает "*строгий режим*", который фактически убирает все косяки, которые есть в языке из-за поддержки старых стандартов.

```javascript
'use strict';
mes = "Daniil, no, there is 'use strict' in the first line of code";
console.log(mes);

// Output: Uncaught ReferenceError: mes1 is not defined
//    at <anonymous>:2:6
```
# Источники
1. [MDN - Let](https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Statements/let)
2. [ECMA - 262](https://tc39.es/ecma262/#sec-let-and-const-declarations)
3. [DigitalOcean - Understanding Hoisting](https://www.digitalocean.com/community/tutorials/understanding-hoisting-in-javascript) или [Разбираемся с "поднятием" (перевод)](https://medium.com/@stasonmars/%D1%80%D0%B0%D0%B7%D0%B1%D0%B8%D1%80%D0%B0%D0%B5%D0%BC%D1%81%D1%8F-%D1%81-%D0%BF%D0%BE%D0%B4%D0%BD%D1%8F%D1%82%D0%B8%D0%B5%D0%BC-hoisting-%D0%B2-javascript-7d2d27bc51f1)
4. [ECMAScript 5.1 Specification - Directive Prologues and the Use Strict Directive](https://262.ecma-international.org/5.1/#sec-14.1)