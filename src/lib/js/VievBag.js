class VievBag extends Bag
{
    constructor()
    {
        super();
    }

    /**
     * Функция возвращает Html разметку содержимого сумки
     */
    returnHtmlBag()
    {
      return `
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">`+this.bagTranslate(this.returnMasCuckies())[0]+`</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                `+this.returnBagList()+`<br>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        `;
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
     * Cтавит в сумке кнопку Eat против съедобных предметов в сумке.
     * Это предмены с приставкой user_bag_ в куках.
     * Что было съедено - шифруется в значение post запросса от кнопки.
     */    
        createButtonEat(value)
        {
          return `<form method="post">
                   <button 
                     type="submit"
                     class="btn btn-secondary"
                     name="Eat"
                     value="${value}"
                   >
                     ${this.searchCookies('user_bagEat')[0].propertyName}
                    </button>
                  </form>`;
        }

        addOnButtonEatParametrValue(food, objFood) {    
            if (food!=='user_bag_') return '';    
            let value = objFood.propertyName+'_'+objFood.propertyVal;    
            return this.createButtonEat(value);
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
