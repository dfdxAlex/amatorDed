/** функция создает HTML строку, содержащую разметку с содержимым
 * сумки, именно Еды. Если Еды в сумке нет, то необходимо вернуть
 * false
 * 
 * Развитие функции. Функция выводит остальные категории предметов
 * если во входном параметре указать категорию. Если не указывать ничего
 * то функция по прежнему работает с едой.
 */

function onBag(searchCategory = "user_bag_")
{
   let rez='';
   /**
    * создать чистый массив с оъектами, содержащими
    * нужные свойства
    */
     masCoocks = searchCookies(searchCategory);

     /**
      * перебрать массив очищенных куков и построить кнопки
      */
     masCoocks.forEach(
         (e)=>{
               rez+=`<div class="row">
                       <div class="col-5">
                         <span
                           class="btn btn-secondary"
                         >
                           ${e.propertyName}
                         </span>
                       </div>
                       <div class="col-2">
                         <span
                           class="btn btn-secondary"
                         >
                       ${e.propertyVal}
                          </span>
                        </div>
                        <div class="col-5">
                          <b>${addButtonEat(searchCategory,e.propertyName)}</b>
                        </div>
                      </div>
                    `;
               }
          );
          if (rez!='')
              return '<section class="container">'+rez+'</section>';
          else return false;
}
