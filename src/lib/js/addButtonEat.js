/**
 * Функция ставит в сумке кнопку Eat - Есть.
 * Кнопка ставится только против предметов, которые можно есть.
 * Если searchCategory = user_bag_, то предмет можно есть.
 * 
 * createButtonEat()
 * Что было съедено - шифруется в значение post запросса от 
 * кнопки. Value = "имя предмета"+"_"+"энергетическая ценность"
 */
function addButtonEat(food, objFood) {

    if (food!=='user_bag_') return '';

    let value = objFood.propertyName+'_'+objFood.propertyVal;

    return createButtonEat(value);
}
