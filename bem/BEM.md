# БЭМ
> БЭМ (Блок, Элемент, Модификатор) — компонентный подход к веб-разработке. В его основе лежит принцип разделения интерфейса на независимые блоки. Он позволяет легко и быстро разрабатывать интерфейсы любой сложности и повторно использовать существующий код, избегая «Copy-Paste».

## Блок
Функционально независимый компонент страницы, который может быть повторно использован.

Блоком является сущность, которую можно перенести в любой раздел страницы и она не поменяет своего назначения.

Название блока обычно должно охарактеризовывать его. Если называть `header` с помощью методологии БЭМ, то это будет не

```html
<header class="header">

</header>
```

### Принципы блоков
1. Вложенность. Блоки можно вкладывать в друг-друга

```html
<header class="header">
  <nav class="navigation">
    <ul class="links">

    </ul>
  </nav>
</header>
```

## Элемент
Вторая главная сущность в методологии БЭМ. Элемент - дочерний элемент блока, *который не может быть использован вне класса*.

Название элемента характеризует сущность внутри блока и отвечает на вопрос: "Что это?", а не "Какой?".

```html
<header class="header">
  <nav class="navigation">
    <ul class="navigation__links">
      <li class="navigation__link"></li>
      <li class="navigation__link"></li>
      <li class="navigation__link"></li>
    </ul>
  </nav>
</header>
```

Как можно увидеть в данном примере я переделал `links` в `navigation__links`, для того чтобы придать сущности `ul` роль элемента блока `navigation`. Теперь `ul.navigation__link` нельзя использовать без блока `navigation`.

Как можно увидеть элементы отделяются от блоков двойным нижним подчеркиванием (`__`).

### Принципы элементов
1. Вложенность. Множество элементов блока можно вкладывать в друг-друга, однако, *нельзя делать элементы родителями элементов в названии*.

**Правильно:**
```html
<div class="block">
  <div class="block__element">
    <div class="block__element">

    </div>
  </div>
</div>
```

**Неправильно:**
```html
<div class="block">
  <div class="block__element">
    <div class="block__element__element">

    </div>
  </div>
</div>
```

Проще говоря элементы должны относится к блоку, а не к остальным элементам, даже если они вложенны.

2. Принадлежность. Элемент не может использоваться вне блока.
3. Необязательность. Не у всех блоков должны быть элементы.

## Модификатор
Третьим главным термином БЭМ является модификатор. Модификатор используется для того, чтобы придать блоку или элементу какие-то свойства, который могут быть необязательными.

Модификатор вместе с блоком или элементом пишутся отдельно от главного имени блока или элемента.

```html
<div class=" block block_width_100">
</div>

<div class="text">
  <p class="text__simple text__simple_1rem">Size of this text is 1rem!</p>
</div>
```

Как можно увидеть помимо имени `block`, у блока есть ещё модификатор `block_width_100`, который (наверное) устанавливает ширину блока в 100%. Также у элемента `text__simple` есть модификатор `text__simple_1rem`, который устанавливает размер текста 1rem.

Модификаторы указываются через `_`.

## Миксы
Одна сущность может являться одновременно и блоком, и элементом.

Модификатор может задавать блоку:
* внешний вид;
* поведение;
* состояние;
* структуру.

```html
<header class="header">
  <nav class="header__navigation navigation">
    <ul class="navigation__links">

    </ul>
  </nav>
</header>
```

В данном примере сущность `nav` является миксом (*одновременно является и блоком, и элементом*).

Делается это для того, чтобы `nav` мог использоваться где-то ещё, а `.header__navigation` придавал ему свойства, которые будут действовать только внутри блока `header`.

## Особенности стилизации блоков и элементов
* Принцип единственной ответственности.
  Блоки нельзя стилизовать так, чтобы их нельзя было переиспользовать. Это значит что внешнюю геометрию и позиционирование должно задаваться только у **элементов**.

  ```html
  <header class="header">
    <nav class="header__navigation navigation">

    </nav>
  </header>
  ```

  ```css
  .navigation {
    background-color: brown;
    color: white;
    font-size: 14px;
    padding: .5rem;
  }
  .header__navigation {
    max-width: 100px;
    margin: 12px;
  }
  ```
* Принцип открытости/закрытости.
  Блоки нельзя модифицировать для каждого случая изменения внешнего вида. Для того, чтобы изменить внешний вид уже созданного блока нужно использовать модификатор.

  **Правильно**:
  ```html
  <button type="button" name="button" class="button"></button>
  <button type="button" name="button" class="button_size_xs"></button>
  ```

  ```css
  .button {
    border: none;
    background-color: white;
    color: brown;
    padding: 12px;
    max-width: 100px;
  }

  .button_size_xs {
    padding: 6px;
    max-width: 50px;
  }
  ```

* DRY
  Применительно к методологии БЭМ суть данного принципа заключается в том, что каждая БЭМ-сущность должна иметь единственное, однозначное представление в рамках системы.
  В целом это можно описать так: *не нужно плодить классы для схожих семантически элементов с похожими правилами CSS.* Можно просто сделать один общий класс, а все отличия описать с помощью модификаторов.

# Источники
1. [Документация БЭМ](https://ru.bem.info/methodology/quick-start/)
