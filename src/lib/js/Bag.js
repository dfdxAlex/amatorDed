class Bag 
{
    /**
     * Cтавит в сумке кнопку Eat против съедобных предметов в сумке.
     * Это предмены с приставкой user_bag_ в куках.
     * Что было съедено - шифруется в значение post запросса от кнопки.
     * Value = "имя предмета"+"_"+"энергетическая ценность"
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
