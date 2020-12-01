/**
  Перечислить все, что вы бы поправили в таблицах тип данных, название, длину - что угодно - и почему

  1. Таблица users
    - name - может принимать значение NULL, заменить на NOT NULL, зачем заводить юзера без имени
    - для ФИО пользователя необходимо предусмотреть 3 поля - name, surname, second_name с достаточным размером, при этом second_name может принимать значение NULL
  2. Таблица offices
    - name - может принимать значение NULL, заменить на NOT NULL
  3. Обшие замечания
    - таблицы не согласованы, мы можем завести пользователя с неизвестным офисом и потом долго думать куда же он делся
    - так как в таблице users есть поле offices_id то необходим внешний ключ, для согласованности таблицы
  Чтобы завести внешний ключ, необходимо изменить  поля в таблице offices - сделать, таким же как в offices_id в таблице users

 */

-- Выведите имена пользователей и названия офисов, в которых они сидят

select users.name as "ФИО Пользователя", offices.name as "Название офиса" from users
    inner join offices on users.office_id = offices.id;

-- Выведите названия офисов, в котором сидят больше, чем один пользователь

select offices.name as "Название офиса" from offices
    inner join users u on offices.id = u.office_id
    group by offices.name
    having count(u.office_id) > 1;