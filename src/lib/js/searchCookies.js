/**
 * функция ищит все куки заданной категории, то есть с заданным
 * ключём и возвращает массив в виде имя кукиса и его значения.
 */

function searchCookies(searchCategory)
{
    /**
     * Прочитать все куки и поместить их в массив.
     * Массив содержит грязные куки, не обработанные.
     */
    let masCookies = returnMasCuckies();

    /**массив для хранения очищенного массива куков */
    let masRez = [];
    let objRez = {};

    masCookies.forEach(
        (e)=>{
              if (e.includes(searchCategory)) {
                  /**сделать из конкретной 
                   * строки кука ещё один
                   * массив: [0]-имя кука
                   * [1] - значение кука
                   */
              let timeMas = e.split('=');
                   objRez.propertyName = timeMas[0];
                   objRez.propertyVal = timeMas[1];
                   objRez.propertyName = objRez.propertyName.replace(searchCategory,'');
                   objRez.propertyName = deCoderIntToUTF8(objRez.propertyName);
                   /** Очистить значение кука от %22 */
                   objRez.propertyVal = objRez.propertyVal.replace('%22','');
                   objRez.propertyVal = objRez.propertyVal.replace('%22','');                  
                   masRez.push(objRez);
                }
            }
           );
return masRez;
}
