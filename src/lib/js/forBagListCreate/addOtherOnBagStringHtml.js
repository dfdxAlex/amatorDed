/**
 * Функция добавляет предметы в сумку из куков пользователя
 * с категорией Другие или Разные
 */

function addOtherOnBagStringHtml(returnStringHtmlBag, objTranslate)
{
    if (onBag('user_bagOther')!==false) {
      returnStringHtmlBag+=objTranslate.other+onBag('user_bagOther');
      returnStringHtmlBag+='<br>';
    }
    return returnStringHtmlBag;
}
