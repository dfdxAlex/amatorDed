 /**
  * Функция возвращает из куков строку с одеждой.
  * Эта строка в будущем попадает в содержимое сумки
  */

function addClothOnBagStringHtml(returnStringHtmlBag, objTranslate)
{
    if (onBag('user_bagCloth')!==false) {
      returnStringHtmlBag+=objTranslate.сloth+onBag('user_bagCloth');
      returnStringHtmlBag+='<br>';
    }

    return returnStringHtmlBag;
}
