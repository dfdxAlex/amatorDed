/**
 * Функция создает содержимое сумки, проверяя все куки в 
 * поиске информации.
 * 
 */

function bagListCreate()
{
    let rez = '';
    /**массив будет хранить все куки */
    let masCoocks = [];

    /**массив с переводами */
    let objTranslate = {};

    /**куки приходят строкой, переделать их в массив */
    masCoocks = returnMasCuckies();

    // onBag(masCoocks);

    /** вернуть в это свойство перевод слова Сумка 
     * функция bagTranslate() подключается в файле 
     * FutterDecorator.php
    */
    mas = bagTranslate(masCoocks);
    objTranslate.bag = mas[0];
    objTranslate.food = mas[1];
    objTranslate.сloth = mas[2];
    objTranslate.weapon = mas[3];
    objTranslate.armor = mas[4];
    objTranslate.other = mas[5];

    /**
     * В переменную поместим заголовок с едой, если еда в сумке есть
     */
    if (onBag(masCoocks)!==false) {
      rez+=objTranslate.food+onBag(masCoocks);
      rez+='<br>';
    }
    
    /**
     * В переменную поместим заголовок с сloth, если еда в сумке есть
     */
    if (onBag(masCoocks,'user_bagCloth')!==false) {
      rez+=objTranslate.сloth+onBag(masCoocks,'user_bagCloth');
      rez+='<br>';
    }
    /**
     * В переменную поместим заголовок с weapon, если еда в сумке есть
     */
    if (onBag(masCoocks,'user_bagWeapon')!==false) {
      rez+=objTranslate.weapon+onBag(masCoocks,'user_bagWeapon');
      rez+='<br>';
    }
    /**
     * В переменную поместим заголовок с weapon, если еда в сумке есть
     */
    if (onBag(masCoocks,'user_bagArmor')!==false) {
      rez+=objTranslate.armor+onBag(masCoocks,'user_bagArmor');
      rez+='<br>';
    }
    /**
     * В переменную поместим заголовок с Other, если еда в сумке есть
     */
    let blockOther = '';
    if (onBag(masCoocks,'user_bagOther')!==false) {
      rez+=objTranslate.other+onBag(masCoocks,'user_bagOther');
      rez+='<br>';
    }
    return rez;
}
