class BagListCreate extends Cookies
{
  constructor()
  {
    super();
    this.bag = new Bag;
  }
  
   /** 
    * Вернуть объект с переводами заголовков сумки, еда, оружие...
    * функция bagTranslate() 
    */  

  translateTitleForBag()
  {
      let objTranslate = {};
      let mas = [];
      mas = this.bag.bagTranslate(this.returnMasCuckies());
      objTranslate.bag = mas[0];
      objTranslate.food = mas[1];
      objTranslate.сloth = mas[2];
      objTranslate.weapon = mas[3];
      objTranslate.armor = mas[4];
      objTranslate.other = mas[5];  

      return objTranslate;
  }

  returnBagList()
  {
      let objTranslate = this.translateTitleForBag();
  
      let returnStringHtmlBag = '';
  
      returnStringHtmlBag = this.addFoodOnBagStringHtml(returnStringHtmlBag, objTranslate);
      
      returnStringHtmlBag = this.addClothOnBagStringHtml(returnStringHtmlBag, objTranslate);
  
      returnStringHtmlBag = this.addWeaponOnBagStringHtml(returnStringHtmlBag, objTranslate);
  
      returnStringHtmlBag = this.addArmorOnBagStringHtml(returnStringHtmlBag, objTranslate);
  
      returnStringHtmlBag = this.addOtherOnBagStringHtml(returnStringHtmlBag, objTranslate);
  
      return returnStringHtmlBag;
  }

    /**
     * Функция ищет в куках игрока оружие в сумке, если оно есть,
     * то формирует строку и возвращает её.
     */
    addArmorOnBagStringHtml(returnStringHtmlBag, objTranslate)
    {
        if (onBag('user_bagArmor')!==false) {
            returnStringHtmlBag+=objTranslate.armor+onBag('user_bagArmor');
            returnStringHtmlBag+='<br>';
        }
        return returnStringHtmlBag;
    }

    /**
     * Функция ищет еду в куках и возвращает html разметку
     * для помещения найденной еды в сумку
     */    

    addFoodOnBagStringHtml(stringHtml, titleFood)
    {
        if (onBag()!==false) {
          stringHtml+=titleFood.food+onBag()+'<br>';
        }
        return stringHtml;
    }

     /**
      * Функция возвращает из куков строку с одеждой.
      * Эта строка в будущем попадает в содержимое сумки
      */    

    addClothOnBagStringHtml(returnStringHtmlBag, objTranslate)
    {
        if (onBag('user_bagCloth')!==false) {
          returnStringHtmlBag+=objTranslate.сloth+onBag('user_bagCloth');
          returnStringHtmlBag+='<br>';
        }    

        return returnStringHtmlBag;
    }

    /**
     * Функция добавляет предметы в сумку из куков пользователя
     * с категорией Другие или Разные
     */    

    addOtherOnBagStringHtml(returnStringHtmlBag, objTranslate)
    {
        if (onBag('user_bagOther')!==false) {
          returnStringHtmlBag+=objTranslate.other+onBag('user_bagOther');
          returnStringHtmlBag+='<br>';
        }
        return returnStringHtmlBag;
    }

    /**
     * Функция ищет в куках сумки игрока предметы типа оружия,
     * если они есть, то поместить их в отдельную категорию сумки
     */    

    addWeaponOnBagStringHtml(returnStringHtmlBag, objTranslate)
    {
        if (onBag('user_bagWeapon')!==false) {
          returnStringHtmlBag+=objTranslate.weapon+onBag('user_bagWeapon');
          returnStringHtmlBag+='<br>';
        }
        return returnStringHtmlBag;
    }
}
