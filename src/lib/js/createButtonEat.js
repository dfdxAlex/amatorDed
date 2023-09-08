/**
 * Функция addButtonEat()!!! ставит в сумке кнопку Eat - Есть.
 * Кнопка ставится только против предметов, которые можно есть.
 * Если searchCategory = user_bag_, то предмет можно есть.
 * 
 * createButtonEat()!!!
 * Что было съедено - шифруется в значение post запросса от 
 * кнопки. Value = "имя предмета"+"_"+"энергетическая ценность"
 */

function createButtonEat(value)
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
