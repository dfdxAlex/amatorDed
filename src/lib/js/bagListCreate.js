/**
 * Функция создает содержимое сумки, проверяя все куки в 
 * поиске информации.
 */

function bagListCreate()
{
    const bagList = new BagListCreate();
    const masCookies = new Cookies();

    /**куки приходят строкой, переделать их в массив */
    let masCoocks = masCookies.returnMasCuckies();

    let objTranslate = translateTitleForBag(masCoocks);

    let returnStringHtmlBag = '';

    returnStringHtmlBag = bagList.addFoodOnBagStringHtml(returnStringHtmlBag, objTranslate);
    
    returnStringHtmlBag = bagList.addClothOnBagStringHtml(returnStringHtmlBag, objTranslate);

    returnStringHtmlBag = bagList.addWeaponOnBagStringHtml(returnStringHtmlBag, objTranslate);

    returnStringHtmlBag = bagList.addArmorOnBagStringHtml(returnStringHtmlBag, objTranslate);

    returnStringHtmlBag = bagList.addOtherOnBagStringHtml(returnStringHtmlBag, objTranslate);

    return returnStringHtmlBag;
}
