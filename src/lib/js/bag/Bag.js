class Bag  extends Cookies
{
   
   /** 
    * Вернуть объект с переводами заголовков сумки, еда, оружие...
    * функция bagTranslate() 
    */  

   translateTitleForBag()
   {
       let objTranslate = {};
       let mas = [];
       mas = this.bagTranslate(this.returnMasCuckies());
       objTranslate.bag = mas[0];
       objTranslate.food = mas[1];
       objTranslate.сloth = mas[2];
       objTranslate.weapon = mas[3];
       objTranslate.armor = mas[4];
       objTranslate.other = mas[5];  
 
       return objTranslate;
   }

  /**
   * Задача функции вернуть из куков категории(перевод) сумки - еда, одежда ...
   * Слово Еда или его перевод хранится в куке translate_food
   * Слово Сумка или его перевод хранится в куке translate_bag
   * Слово Одежда или его перевод хранится в куке translate_сloth
   * Слово Оружие или его перевод хранится в куке translate_weapon
   * Слово Броня или его перевод хранится в куке translate_armor
   * Слово Броня или его перевод хранится в куке translate_other_items
   */
   bagTranslate(masCoocks) 
   {
     let masRez = [];
     let translateName;
     let translateVal;
     
       masCoocks.forEach(
          (e)=>{
            if (e.includes('translate_')) {
                [translateName,translateVal] = e.split('=');
                translateName = translateName.replace('translate_','');
                translateName = translateName.replaceAll(' ','');

                translateVal = translateVal.replaceAll('%22','');
                translateVal = translateVal.replaceAll(' ','');
                translateVal = this.deCoderIntToUTF8(translateVal);
                
                this.returnArrayWithTranslate(translateName,translateVal,masRez);
               }
              }
             );
             return masRez;
       }

  /** */
  returnArrayWithTranslate(translateName,translateVal, arrayWithTranslate)
  {
      switch (translateName) {
        case 'bag': 
            arrayWithTranslate[0] = translateVal;
            break;
        case 'food':
            arrayWithTranslate[1] = translateVal;
            break;
        case 'сloth':
            arrayWithTranslate[2] = translateVal;
            break;
        case 'weapon':
            arrayWithTranslate[3] = translateVal;
            break;
        case 'armor':
            arrayWithTranslate[4] = translateVal;
            break;
        case 'other_items':
            arrayWithTranslate[5] = translateVal;
      }
  }




}


/**
 * Функция рисует содержиме сумки.
 * Кода содержимого (справка)
 * user_bag_ - еда
 * user_bagCloth - одежда
 * user_bagWeapon - оружие
 * user_bagArmor - броня
 * user_bagOther - другие предметы
 */
