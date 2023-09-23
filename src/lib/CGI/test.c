#include <time.h> // Директива нужна для инициализации функции rand() 
#include <stdio.h> // Включаем поддержку функций ввода/вывода 
#include <stdlib.h> // А это — для поддержки функции rand() 
#include "mylib.h"
#include <string.h>

int main(void) { 

 returnHeader();
 returnPageHeader("Случайное число");



 returnStringTag("Привет мир","h1");

 returnIntTag(333, "h1");

 
 
 returnEntPage();

} 


