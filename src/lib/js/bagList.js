/**
 * Функция рисует содержиме сумки.
 * Кода содержимого (справка)
 * user_bag_ - еда
 * user_bagCloth - одежда
 * user_bagWeapon - оружие
 * user_bagArmor - броня
 * user_bagOther - другие предметы
 * 
 */
/**
 * Функция находит ID дива для сумки и вставляет 
 * в него html сумки
 */
function bagList()
{
  let position = document.getElementById('for-bag');
  position.innerHTML = returnHtmlBag();
}


