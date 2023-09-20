#include <time.h> // Директива нужна для инициализации функции rand() 
#include <stdio.h> // Включаем поддержку функций ввода/вывода 
#include <stdlib.h> // А это — для поддержки функции rand() 

int main(void) { 
 int num; 
 time_t t; 
 srand(time(&t)); 

 // В num записывается случайное число от 0 до 9 
 num = rand() % 10; 

 // Далее выводим заголовки ответа 
 printf("Content-type: text/html\n"); 
 // Запрет кэширования данных браузером 
 printf("Pragma: no-cache\n"); 
 // Пустой заголовок 
 printf("\n"); 
 
 // Выводим текст документа - его мы увидим в браузере 
 printf("<!DOCTYPE html>"); 
 printf("<html lang='ru'>"); 
 printf("<head>"); 
 printf("<title>Случайное число</title>"); 
 printf("<meta charset='utf-8'>"); 
 printf("</head>"); 
 printf("<body>"); 
 printf("<h1>Здравствуйте!</h1>"); 
 printf("<p>Случайное число в диапазоне 0-9: %d</p>", num); 
 printf("</body>"); 
 printf("</html>"); 
} 
