
function bagList()
{
  let classVievBag = new VievBag;
  let position = document.getElementById('for-bag');
  position.innerHTML = classVievBag.returnHtmlBag();
}
