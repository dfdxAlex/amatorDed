/**
 * функция принимает параметр категории перебираемого кука
 * и имя кука. Если имя из категории user_bag_, то рисуем
 * для него кнопку Есть-Кушать
 */
function addButtonEat(searchCategory,propertyName) {
let but = '';
if (searchCategory=='user_bag_') {
  but=`<form method="post">
         <button 
           type="submit"
           class="btn btn-secondary"
           name="Eat"
           value="${propertyName}"
         >
           Eat
          </button>
       </form>`;
}
  return but;
}
