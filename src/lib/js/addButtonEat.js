/**
 * функция принимает параметр категории перебираемого кука
 * и имя кука. Если имя из категории user_bag_, то рисуем
 * для него кнопку Есть-Кушать
 */
function addButtonEat(searchCategory,e) {
let thisE = e;
let but = '';
if (searchCategory=='user_bag_') {
  /**
   * При прорисовке кнопки, в валью кнопки добавляется имя 
   * кука и его значение. Значение добавляется для того, чтобы 
   * php нашел нужный кук. По имени кук не ищу потому, что имя
   * бывает на кирилице и оно должно быть закодировано при отправки
   * в кук.
   */
  but=`<form method="post">
         <button 
           type="submit"
           class="btn btn-secondary"
           name="Eat"
           value="${thisE.propertyName}_${thisE.propertyVal}"
         >
           ${searchCookies('user_bagEat')[0].propertyName}
          </button>
       </form>`;
}
  return but;
}
