/**
 * Функция ищет в куках игрока оружие в сумке, если оно есть,
 * то формирует строку и возвращает её.
 */
function addArmorOnBagStringHtml(returnStringHtmlBag, objTranslate)
{
    if (onBag('user_bagArmor')!==false) {
        returnStringHtmlBag+=objTranslate.armor+onBag('user_bagArmor');
        returnStringHtmlBag+='<br>';
    }
    return returnStringHtmlBag;
}
