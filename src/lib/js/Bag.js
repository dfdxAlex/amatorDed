class Bag 
{
  constructor() {
    this.coderDeCoder = new CoderDeCoder();
    this.cookies = new Cookies();
  }
  
  /**
   * Задача функции вернуть из куков категории сумки - еда, одежда ...
   * Слово Еда или его перевод хранится в куке translate_food
   * Слово Сумка или его перевод хранится в куке translate_bag
   * Слово Одежда или его перевод хранится в куке translate_сloth
   * Слово Оружие или его перевод хранится в куке translate_weapon
   * Слово Броня или его перевод хранится в куке translate_armor
   * Слово Броня или его перевод хранится в куке translate_other_items
   * 
   * Функция принимает массив с грязными куками, выбирает 
   * тот кук, в котором пришло слово Сумка или его перевод,
   * очищает, собирает из Юникода в строку и возвращает
   */

   bagTranslate(masCoocks) {
     let propertyVal;
     let masRez = [];
     let timeMas;
     let propertyName;
     
       masCoocks.forEach(
          (e)=>{
            if (e.includes('translate_')) {
                timeMas = e.split('=');
                propertyName = timeMas[0];
                propertyVal = timeMas[1];
                propertyName = propertyName.replace('translate_','');
                propertyName = propertyName.replaceAll(' ','');
                
                /** Очистить значение кука от %22 */
                propertyVal = propertyVal.replaceAll('%22','');
                propertyVal = propertyVal.replaceAll(' ','');

                /** декодировать данные, полученне
                 * из куков о названии Сумки
                 */
                propertyVal = this.coderDeCoder.deCoderIntToUTF8(propertyVal);
                
                if (propertyName=='bag') {
                  masRez[0] = propertyVal;
                }
                if (propertyName=='food') {
                  masRez[1] = propertyVal;
                }
                if (propertyName=='сloth') {
                 masRez[2] = propertyVal;
                }
                if (propertyName=='weapon') {
                 masRez[3] = propertyVal;
                }
                if (propertyName=='armor') {
                 masRez[4] = propertyVal;
                }
                if (propertyName=='other_items') {
                 masRez[5] = propertyVal;
                }
               }
              }
             );
             return masRez;
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
                 ${this.cookies.searchCookies('user_bagEat')[0].propertyName}
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
