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
      return `<form method="post">
               <button 
                 type="submit"
                 class="btn btn-secondary"
                 name="Eat"
                 value="${value}"
               >
                 ${searchCookies('user_bagEat')[0].propertyName}
                </button>
              </form>`;
    }
}
