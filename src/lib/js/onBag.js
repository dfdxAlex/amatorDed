/** функция создает HTML строку, содержащую разметку с содержимым
 * сумки, именно Еды. Если Еды в сумке нет, то необходимо вернуть
 * false
 * 
 * Развитие функции. Функция выводит остальные категории предметов
 * если во входном параметре указать категорию. Если не указывать ничего
 * то функция по прежнему работает с едой.
 */

function onBag(masCoocks, searchCategory = "user_bag_")
{
        let propertyVal;
        let rez='';
          masCoocks.forEach(
              (e)=>{
                if (e.includes(searchCategory)) {
                    /**сделать из конкретной 
                     * строки кука ещё один
                     * массив: [0]-имя кука
                     * [1] - значение кука
                     */
                    let timeMas = e.split('=');
                    let propertyName = timeMas[0];
                    propertyVal = timeMas[1];
                    propertyName = propertyName.replace(searchCategory,'');
                    propertyName = deCoderIntToUTF8(propertyName);
                    console.log(propertyName);
                    /** Очистить значение кука от %22 */
                    propertyVal = propertyVal.replace('%22','');
                    propertyVal = propertyVal.replace('%22','');
                    // console.log(propertyVal);

                    rez+=`<div class="row">
                            <div class="col-6">
                              <b>${propertyName}</b>
                            </div>
                            <div class="col-6">
                              <b>${propertyVal}</b>
                            </div>
                          </div>
                        `;
                }
              }
                
          );
          if (rez!='')
              return '<section class="container">'+rez+'</section>';
          else return false;
}
