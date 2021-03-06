# Темы, которые нужно выучить

* [Node.js](1-NodeJS.md)

# JSHint

> **JSHint** - это инструмент статического анализа кода, используемый при разработке программного обеспечения для проверки соответствия исходного кода JavaScript правилам кодирования. JSHint был создан в 2011 году Антоном Ковалевым как форк проекта JSLint.
> 
> [Википедия](https://en.wikipedia.org/wiki/JSHint)

## Настройка JSHint

JSHint настраивается с помощью файла под названием `.jshintrc`, который нужно поместить в корневую папку проекта, для того чтобы у каждого проекта были свои правила форматирования.

Для того чтобы использовать JSHint нужно сначала скачать его с помощью **npm**:

```bash
sudo npm i -g jshint
```

Далее, для того чтобы JSHint мог взаимодействовать с нашим редактором нам нужно установаить необходимые плагины. Я пользуюсь 3 редакторами: *VSCode, Atom, Vim*, поэтому покажу как установить поддержку JSHint для каждого. 

### VSCode

Для VSCode есть одноименное расширение. Для того, чтобы установить его нужно нажать `Ctrl + p` и ввести `ext install dbaeumer.jshint`.

### Atom

Для Atom тоже есть одноименное расширение. Для того чтобы установить его можно войти в настройки, найти вкладку Extensions и ввести там jshint, или войти в терминал и ввести:

```bash
apm install jshint
```

### Vim

Для Vim есть расширение, которое тоже будет использовать jshint как линтер.

Для того, чтобы установить данное расширение нужно для начала установить plug.vim, а затем установить следующее расширение: `wookiehangover/jshint.vim`.
