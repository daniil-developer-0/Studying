'use strict';

//* Числа
let number = 4;
let number1 = 2.3;

// Оператор, который проверяет тип переменной:
console.log(typeof number); // Output: number;
console.log(typeof number1); // Output: number;


//* Числа: Infinity, -Infinity
console.log(1/0); // Output: Infinity
// Проверяем тип
console.log(typeof(1/0)); // Output: number;

console.log(-1/0); // Output: -Infinity;
// Проверяем тип
console.log(typeof -1/0) // Output: number;


//* NaN - Not A Number
console.log('Hello, world' + 2); // Output: NaN


//* Строка
const name = "Daniil";
const name1 = 'Daniel';
const name2 = `Danil`;


//* Логика (Boolean)
const fullage = true;
const child = false;


//* null
console.log(SOMETHING); // Ссылаемся на несуществующий объект


//* undefined
// Что-то инициализировано, но без значения
let something;
console.log(something);


//* Объект
const PERSON = {
    'name': 'Daniil',
    'secondName': "Shilo",
    'sayHello': console.log("Hello")
};

// Массив
let names = ['Daniil', 'Masha', 'Katya', 'Igor', 'Konstantin', 'Ilya', 'Alexandra'];