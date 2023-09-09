 /** 
  * Вернуть объект с переводами заголовков сумки, еда, оружие...
  * функция bagTranslate() 
  */

function translateTitleForBag(masCoocks)
{
    let objTranslate = {};
    mas = bagTranslate(masCoocks);
    objTranslate.bag = mas[0];
    objTranslate.food = mas[1];
    objTranslate.сloth = mas[2];
    objTranslate.weapon = mas[3];
    objTranslate.armor = mas[4];
    objTranslate.other = mas[5];

    return objTranslate;
}
