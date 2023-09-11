/**
 * Функция создает содержимое сумки, проверяя все куки в 
 * поиске информации.
 */

function bagListCreate()
{
    /**куки приходят строкой, переделать их в массив */
    let masCoocks = returnMasCuckies();

    let objTranslate = translateTitleForBag(masCoocks);

    let returnStringHtmlBag = '';

    returnStringHtmlBag = addFoodOnBagStringHtml(returnStringHtmlBag, objTranslate);
    
    returnStringHtmlBag = addClothOnBagStringHtml(returnStringHtmlBag, objTranslate);

    returnStringHtmlBag = addWeaponOnBagStringHtml(returnStringHtmlBag, objTranslate);

    returnStringHtmlBag = addArmorOnBagStringHtml(returnStringHtmlBag, objTranslate);

    returnStringHtmlBag = addOtherOnBagStringHtml(returnStringHtmlBag, objTranslate);

    return returnStringHtmlBag;
}
