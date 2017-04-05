### Задание 1
Код задания №1 расположен в папке `src/`

Работает под PHP 7.0 +

Проверить работу можно запустив в CLI скрипт `src/index.php`, выведет несколько фигур на экран в виде псевдо-ASCII-арта :)

### Задание 2

Так как у одного автора может быть много книг, а у одной книги много авторов, то классическая схема хранения таких данных предполагает наличие 3 таблиц:

Первая: `Author (id, name)`
Вторая: `Book (id, name)`
Третья: `BookAuthor (bookId, authorId)`, являющаяся таблицей связей

### Задание 3
В принципе отработает вот такой запрос:

```sql
SELECT
	DISTINCT m.type,
	(SELECT value FROM `data` d WHERE d.type = m.type ORDER BY `date` DESC LIMIT 1) AS value
FROM
  `data` m
```

Если различных `type` немного (а судя по примеру их немного) до будет работать довольно шустро даже с большим объемом данных, при условии создания необходимых индексов, для избежания filesort


Так же есть другой вариант добиться цели:

```sql
SELECT a.type,b.value FROM (
	SELECT
		type,
		MAX(`date`) AS maxDate
	FROM
		`data`
	GROUP BY
		`type`
) a LEFT JOIN `data` b ON b.type = a.type AND a.maxDate = b.date;
```