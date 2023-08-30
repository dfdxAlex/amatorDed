/**
 * Функция рисует содержиме сумки.
 * Кода содержимого
 * user_bag_ - еда
 * user_bagCloth - одежда
 * user_bagWeapon - оружие
 * user_bagArmor - броня
 * user_bagOther - другие предметы
 * 
 */

function bagList()
{

    /**массив будет хранить все куки */
    let masCoocks = [];

    /**массив с переводами */
    let objTranslate = {};

    /**куки приходят строкой, переделать их в массив */
    masCoocks = document.cookie.split(';')

    // onBag(masCoocks);

    /** вернуть в это свойство перевод слова Сумка 
     * функция bagTranslate() подключается в файле 
     * FutterDecorator.php
    */
    mas = bagTranslate(masCoocks);
    objTranslate.bag = mas[0];
    objTranslate.food = mas[1];
    objTranslate.сloth = mas[2];
    objTranslate.weapon = mas[3];
    objTranslate.armor = mas[4];
    objTranslate.other = mas[5];

    /**
     * В переменную поместим заголовок с едой, если еда в сумке есть
     */
    let blockEats = '';
    if (onBag(masCoocks)!==false) {
        blockEats+=objTranslate.food+onBag(masCoocks);
    }

    /**
     * В переменную поместим заголовок с сloth, если еда в сумке есть
     */
    let blockCloth = '';
    if (onBag(masCoocks,'user_bagCloth')!==false) {
      blockCloth+=objTranslate.сloth+onBag(masCoocks,'user_bagCloth');
    }

    /**
     * В переменную поместим заголовок с weapon, если еда в сумке есть
     */
    let blockWeapon = '';
    if (onBag(masCoocks,'user_bagWeapon')!==false) {
      blockWeapon+=objTranslate.weapon+onBag(masCoocks,'user_bagWeapon');
    }

    /**
     * В переменную поместим заголовок с weapon, если еда в сумке есть
     */
    let blockArmor = '';
    if (onBag(masCoocks,'user_bagArmor')!==false) {
      blockArmor+=objTranslate.armor+onBag(masCoocks,'user_bagArmor');
    }

    /**
     * В переменную поместим заголовок с weapon, если еда в сумке есть
     */
    let blockOther = '';
    if (onBag(masCoocks,'user_bagOther')!==false) {
      blockOther+=objTranslate.other+onBag(masCoocks,'user_bagOther');
    }

    let modal = `
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">`+objTranslate.bag+`</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          `+blockEats+`<br>
          `+blockCloth+`<br>
          `+blockWeapon+`<br>
          `+blockArmor+`<br>
          `+blockOther+`<br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  `;

  let position = document.getElementById('for-bag');
  position.innerHTML = modal;

}


// function userBagList() 
// {
//     let masCoocksWork = [];
//     /**просмотреть все куки и найти только куки содержимого
//      * сумки Еда. Куки про еду появились первыми, поэтому они 
//      * без индекса работают. Все куки с user_bag_ - это еда.
//      */
//       masCoocks.forEach(
//         (e)=>{
//           if (e.includes('user_bag_')) {
//               masCoocksWork.push(e);
//           }
//          }
//         );

//     congole.log(masCoocksWork);
// }
