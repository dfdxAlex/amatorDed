#include "mylib.h"
#include <stdio.h>

void returnIntTag(int content, char* tag)
{
    printf("<%s> %d </%s>\n",tag, content, tag);
}

void returnStringH1(char* content)
{
    printf("<h1> %s </h1> \n",content);
}

void returnStringTag(char* content, char* tag)
{
   printf("<%s> %s </%s>\n",tag, content, tag);
}

void returnEntPage()
{
     printf("</body>\n"); 
     printf("</html>\n"); 
}

void returnHeader()
{
     // Далее выводим заголовки ответа 
     printf("Content-type: text/html\n"); 
     // Запрет кэширования данных браузером 
     printf("Pragma: no-cache\n"); 
     // Пустой заголовок 
     printf("\n"); 
}

void returnPageHeader(char* title)
{
 // Выводим текст документа - его мы увидим в браузере 
 printf("<!DOCTYPE html>\n"); 
 printf("<html lang='ru'>\n"); 
 printf("<head>\n"); 

 printf("<title>%s</title>\n", title); 

 printf("<meta charset='utf-8'>\n"); 
 printf("</head>\n"); 
 printf("<body>\n"); 
}
