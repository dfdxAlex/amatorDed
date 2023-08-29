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

function bagTranslate(masCoocks) {
    let propertyVal;
    let masRez = [];
    let timeMas;
    let propertyName;
      masCoocks.forEach(
         (e)=>{
           if (e.includes('translate_')) {
               /**сделать из конкретной 
                * строки кука ещё один
                * массив: [0]-имя кука
                * [1] - значение кука
                */
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
               propertyVal = deCoderIntToUTF8(propertyVal);
               
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
            // console.log(masRez);
            return masRez;
      }
