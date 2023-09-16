class Bag 
{
    /**
     * Cтавит в сумке кнопку Eat против съедобных предметов в сумке.
     * Это предмены с приставкой user_bag_ в куках.
     * Что было съедено - шифруется в значение post запросса от кнопки.
     */    
    createButtonEat(value)
    {
      const timeProperty = new Cookies();
      return `<form method="post">
               <button 
                 type="submit"
                 class="btn btn-secondary"
                 name="Eat"
                 value="${value}"
               >
                 ${timeProperty.searchCookies('user_bagEat')[0].propertyName}
                </button>
              </form>`;
    }

    addOnButtonEatParametrValue(food, objFood) {    
        if (food!=='user_bag_') return '';    
        let value = objFood.propertyName+'_'+objFood.propertyVal;    
        return this.createButtonEat(value);
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
