'use strict';
// Объявление строковой переменной
let stringVar = 'A String';

// Вывод длины переменной
console.log(stringVar.length); // length - свойство *объекта*, которое содержит длину; Output: 8

// Обрезание строки
console.log(stringVar.slice(2,3)); // Output: S
console.log(stringVar.slice(5)); // Output: ing

// Возращает строку между двумя индексами
console.log(stringVar.substring(0,3)); // Output: A S
console.log(stringVar.substring(3,0)); // Output: A S