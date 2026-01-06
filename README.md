<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<code>
Стек: php 8.0, Laravel 9.19, docker/docker-compose, mysql, nginx. 
</code>

## Простое API для управления задачами  

### Ключевые моменты выполненные при реализации:

- Авторизация по Bearer токену. Токен размещен в файле .env.
- Методы соответствуют операциям CRUD.
- Миграции БД.
- Модификаторы доступа, типизация входных и выходных параметров в методах
- Бизнес логика вынесена в сервисный слой.
- Сервисы внедрены с помощью инъекции зависимости. Сервисы типизированы интерфейсами.
- Валидация данных в запросе.


### Статусы задач 

Параметры в headers:
- token

Параметры в body:
- title

#### Создать статус
- title является обязательным.

<code> 
POST /api/task_status 
</code>


#### Показать все статусы
<code> 
GET /api/task_status 
</code>

#### Изменить статус
- title является обязательным.

<code> 
PUT /api/task_status/{id} 
</code>

#### Удалить статус
<code> 
DELETE /api/task_status/{id} 
</code>


  

### Задачи   

Параметры в headers:
- token

Параметры в body:
- title
- description
- status_id

#### Создать задачу
- title, description, status_id являются обязательными.

<code> 
POST /api/tasks 
</code>

#### Показать все задачи
<code> 
GET /api/tasks 
</code>

#### Показать одну задачу
<code> 
GET /api/tasks/{id}
</code>


#### Обновить задачу
- title, description, status_id являются обязательными.

<code> 
PUT /api/tasks/{id}
</code>  

#### Удалить задачу
<code> 
DELETE /api/tasks/{id}
</code>   

### Как запустить в Докере 
После клонирования репозитория, в папке с проектом через терминал выполнить команды: 

<code>docker-compose up -d</code>  
<code>docker exec -it to_do_project_app bash</code>  
<code>composer install </code>  
<code>chmod 777 storage/ -R </code>  
<code>php artisan migrate </code>  
<code>exit </code> 

Приложение будет доступно по адресу:  
http://localhost:8080

PHPMyAdmin для БД будет доступен по адресу:  
http://localhost:8081  
логин: root  
пароль: root




