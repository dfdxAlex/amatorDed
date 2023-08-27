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
                              /**очищаем значение кука только если не было прислано
                               * значение 1. Если пришло 1, то в кук было отправлено
                               * слово на кирилице Сумка. По сути 
                               * здесь должна быть дополнительная система
                               * раскодирования слов на кирилице. 
                               * 1-Сумка, дальше будет
                               */
                              if (timeMas[1] != '%221%22'
                              ) {
                                  propertyVal = propertyVal.replace('%22','');
                                  propertyVal = propertyVal.replace('%22','');
                              } else {
                                propertyVal = "Сумка";
                              }
                          }
                         }
                        );
  
                        return propertyVal;
                  }
