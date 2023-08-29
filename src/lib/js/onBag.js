/** функция рисует содержимое сумки */

function onBag(masCoocks)
{
        let propertyVal;
        let rez='';
          masCoocks.forEach(
              (e)=>{
                if (e.includes('user_bag_')) {
                    /**сделать из конкретной 
                     * строки кука ещё один
                     * массив: [0]-имя кука
                     * [1] - значение кука
                     */
                    let timeMas = e.split('=');
                    let propertyName = timeMas[0];
                    propertyVal = timeMas[1];
                    propertyName = propertyName.replace('user_bag_','');
                    propertyName = deCoderIntToUTF8(propertyName);
                    console.log(propertyName);
                    /** Очистить значение кука от %22 */
                    propertyVal = propertyVal.replace('%22','');
                    propertyVal = propertyVal.replace('%22','');
                    console.log(propertyVal);

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
          return '<section class="container">'+rez+'</section>';
}
