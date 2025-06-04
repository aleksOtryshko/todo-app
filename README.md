
# todo-app

Консольное PHP-приложение для управления задачами. Работает без фреймворков и зависимостей, хранит задачи в `tasks.json`, запускается через терминал (Termux, Linux, Docker).

---

##  Возможности

-  Добавление задач
-  Просмотр всех задач
-  Отметка задач как выполненных
-  Удаление выполненных задач
-  Хранение в `tasks.json`
-  Поддержка Docker
-  Без Composer и внешних библиотек

---

##  Быстрый запуск

###  В Linux

```bash
pkg update && pkg install php git -y
git clone git@github.com:aleksOtryshko/todo-app.git
cd todo-app
php index.php


---

 Через Docker

git clone git@github.com:aleksOtryshko/todo-app.git
cd todo-app
docker build -t todo-app .
docker run -it --rm todo-app

 Не забудь использовать -it, чтобы видеть меню в терминале




---

 Структура проекта

todo-app/
├── index.php                  # CLI-меню
├── tasks.json                 # Хранилище задач
├── Dockerfile                 # Инструкция сборки образа
├── README.md                  # Документация
├── Model/Task.php             # Модель задачи
├── Repository/                # Хранилище (интерфейс и JSON-реализация)
├── Service/TaskService.php    # Бизнес-логика
└── Controller/TaskController.php


---

 CLI-меню

 Меню:
1. Добавить задачу
2. Показать список
3. Удалить завершенные задачи
4. Отметить задачу как выполненную
0. Выйти


---

 Пример использования

 Задача 'Купить хлеб' добавлена
 Задачи:
1. Купить хлеб [✗]

 Задача №1 помечена как выполненная
 Завершенные задачи удалены


---

 Автор

Александр Отрышко

GitHub: @aleksOtryshko

2025



---

 Лицензия

MIT — используй и модифицируй свободно.

---

