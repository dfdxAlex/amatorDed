function bagList()
{

    /**массив будет хранить все куки */
    let masCoocks = [];
    /**массив только для рабочих куков */
    let masCoocksWork = [];

    /**массив с переводами */
    let objTranslate = {};

    /**куки приходят строкой, переделать их в массив */
    masCoocks = document.cookie.split(';')

    // console.log(masCoocks);


    /** вернуть в это свойство перевод слова Сумка 
     * функция bagTranslate() подключается в файле 
     * FutterDecorator.php
    */
    objTranslate.bag = bagTranslate(masCoocks);

    let modal = `
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">`+objTranslate.bag+`</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ... 
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


function userBagList() 
{
    let masCoocksWork = [];
    /**просмотреть все куки и найти только куки содержимого
     * сумки
     */
      masCoocks.forEach(
        (e)=>{
          if (e.includes('user_bag_')) {
              masCoocksWork.push(e);
          }
         }
        );

    congole.log(masCoocksWork);
}
