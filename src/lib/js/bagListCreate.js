/**
 * Функция создает содержимое сумки, проверяя все куки в 
 * поиске информации.
 * 
 */

function bagListCreate()
{
    let rez = '';

    /**куки приходят строкой, переделать их в массив */
    let masCoocks = returnMasCuckies();

    /**
     * Вернуть объект с переводами для типов предметов в сумке,
     * на пример еда, оружие, одежда ...
     */
    let objTranslate = translateTitleForBag(masCoocks);

    /**
     * В переменную поместим заголовок с едой, если еда в сумке есть
     */
    if (onBag()!==false) {
      rez+=objTranslate.food+onBag();
      rez+='<br>';
    }
    
    /**
     * В переменную поместим заголовок с сloth, если еда в сумке есть
     */
    if (onBag('user_bagCloth')!==false) {
      rez+=objTranslate.сloth+onBag('user_bagCloth');
      rez+='<br>';
    }
    /**
     * В переменную поместим заголовок с weapon, если еда в сумке есть
     */
    if (onBag('user_bagWeapon')!==false) {
      rez+=objTranslate.weapon+onBag('user_bagWeapon');
      rez+='<br>';
    }
    /**
     * В переменную поместим заголовок с weapon, если еда в сумке есть
     */
    if (onBag('user_bagArmor')!==false) {
      rez+=objTranslate.armor+onBag('user_bagArmor');
      rez+='<br>';
    }
    /**
     * В переменную поместим заголовок с Other, если еда в сумке есть
     */
    let blockOther = '';
    if (onBag('user_bagOther')!==false) {
      rez+=objTranslate.other+onBag('user_bagOther');
      rez+='<br>';
    }
    return rez;
}
