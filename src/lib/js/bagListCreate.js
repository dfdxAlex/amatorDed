/**
 * Функция создает содержимое сумки, проверяя все куки в 
 * поиске информации.
 * 
 */


function addFoodOnBagStringHtml(stringHtml, titleFood)
{
    /**
     * В переменную поместим заголовок с едой, если еда в сумке есть
     */
    if (onBag()!==false) {
      stringHtml+=titleFood.food+onBag()+'<br>';
    }
    return stringHtml;
}

function bagListCreate()
{
    /**куки приходят строкой, переделать их в массив */
    let masCoocks = returnMasCuckies();

    let objTranslate = translateTitleForBag(masCoocks);

    let returnStringHtmlBag = '';

    returnStringHtmlBag = addFoodOnBagStringHtml(returnStringHtmlBag, objTranslate);
    
    returnStringHtmlBag = addClothOnBagStringHtml(returnStringHtmlBag, objTranslate);


    // /**
    //  * В переменную поместим заголовок с weapon, если еда в сумке есть
    //  */
    // if (onBag('user_bagWeapon')!==false) {
    //   rez+=objTranslate.weapon+onBag('user_bagWeapon');
    //   rez+='<br>';
    // }
    // /**
    //  * В переменную поместим заголовок с weapon, если еда в сумке есть
    //  */
    // if (onBag('user_bagArmor')!==false) {
    //   rez+=objTranslate.armor+onBag('user_bagArmor');
    //   rez+='<br>';
    // }
    // /**
    //  * В переменную поместим заголовок с Other, если еда в сумке есть
    //  */
    // // let blockOther = '';
    // if (onBag('user_bagOther')!==false) {
    //   rez+=objTranslate.other+onBag('user_bagOther');
    //   rez+='<br>';
    // }
    return returnStringHtmlBag;
}



