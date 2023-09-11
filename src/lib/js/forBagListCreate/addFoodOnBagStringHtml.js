/**
 * Функция ищет еду в куках и возвращает html разметку
 * для помещения найденной еды в сумку
 */

function addFoodOnBagStringHtml(stringHtml, titleFood)
{
    if (onBag()!==false) {
      stringHtml+=titleFood.food+onBag()+'<br>';
    }
    return stringHtml;
}
