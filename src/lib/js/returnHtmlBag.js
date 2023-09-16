/**
 * Функция возвращает Html разметку содержимого сумки
 */
function returnHtmlBag()
{
  const bagListC = new BagListCreate;
  const returnBag = new Bag;
  return `
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">`+returnBag.bagTranslate(bagListC.returnMasCuckies())[0]+`</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            `+bagListC.returnBagList()+`<br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    `;
}
