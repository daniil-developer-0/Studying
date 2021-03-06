# Методы и свойства
В данном материале мы рассмотрим основные методы и свойства для следующих объектов:

* String
* Number

## String
Для начала объявляем строку:
```javascript
let astring = 'A string';
```

Далее с помощью свойства `length`, которое есть почти у каждого объекта мы можем посмотреть "длину" объекта. В данном случае `length` будет возращать количество символов в `astring`:
```javascript
console.log(astring.length) // Output: 8
```

### Работа с заменой
Для извлечения подстроки из переменной используют метод `slice`:
```javascript
astring2_3 = astring.slice(2,3); // Variable contain: 's'
console.log(astring2_3); // Output: s
```

Данный метод обрезает строку начиная с индекса, который передан в первом параметре и заканчивая на индексе (не включая), который был передан во втором параметре.

```javascript
astring_5 = astring.slice(5); // Variable contain: 'ing'
console.log(astring_5); // Output: ing
```

Если параметр один, то строка обрезается начиная с индекса переданного в параметре до конца.

Также для извлечения подстроки существует метод `substring`:
