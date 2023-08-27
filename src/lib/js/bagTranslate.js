/**
 * Функция принимает массив с грязными куками, выбмрает 
 * тот кук, в котором пришло слово Сумка или его перевод,
 * очищает, собирает из Юникода в строку и возвращает
 */

function bagTranslate(masCoocks) {
    let propertyVal;
      masCoocks.forEach(
                        (e)=>{
                          if (e.includes('translate_')) {
                              /**сделать из конкретной 
                               * строки кука ещё один
                               * массив: [0]-имя кука
                               * [1] - значение кука
                               */
                              let timeMas = e.split('=');
                              let propertyName = timeMas[0];
                              propertyVal = timeMas[1];
                              propertyName = propertyName.replace('translate_','');

                              /** Очистить значение кука от %22 */
                              propertyVal = propertyVal.replace('%22','');
                              propertyVal = propertyVal.replace('%22','');

                              /** декодировать данные, полученне
                               * из куков о названии Сумки
                               */
                              propertyVal = deCoderIntToUTF8(propertyVal);
                          }
                         }
                        );
  
                        return propertyVal;
                  }
