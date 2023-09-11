/**
 * Функция ищет в куках сумки игрока предметы типа оружия,
 * если они есть, то поместить их в отдельную категорию сумки
 */

function addWeaponOnBagStringHtml(returnStringHtmlBag, objTranslate)
{
    if (onBag('user_bagWeapon')!==false) {
      returnStringHtmlBag+=objTranslate.weapon+onBag('user_bagWeapon');
      returnStringHtmlBag+='<br>';
    }
    return returnStringHtmlBag;
}
