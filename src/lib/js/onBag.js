/** функция создает HTML строку, содержащую разметку с содержимым
 * сумки заданной категории. Если категории в сумке нет, то 
 * необходимо вернуть false
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
                          <b>${addButtonEat(searchCategory,e)}</b>
                        </div>
                      </div>
                    `;
               }
          );
          if (rez!='')
              return '<section class="container">'+rez+'</section>';
          else return false;
}
