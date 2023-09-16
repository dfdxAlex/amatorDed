class Cookies 
{
    /**
     * функция ищет все куки заданной категории, то есть с заданным
     * ключём и возвращает массив в виде имя кукиса и его значения.
     */    
    searchCookies(markerCategory)
    {
        let masCookies = this.returnMasCuckies();    

        let arrayCleaned = [];
        let objRez = {};    

        let timeProperty = new CoderDeCoder();    

        masCookies.forEach(
            (e)=>{
                  if (e.includes(markerCategory)) {
                  let timeMas = e.split('=');
                       objRez.propertyName = timeMas[0];
                       objRez.propertyVal = timeMas[1];
                       objRez.propertyName = objRez.propertyName.replace(markerCategory,'');
                       objRez.propertyName = timeProperty.deCoderIntToUTF8(objRez.propertyName);
                       objRez.propertyVal = objRez.propertyVal.replace('%22','');
                       objRez.propertyVal = objRez.propertyVal.replace('%22','');                  
                       arrayCleaned.push(objRez);
                    }
                }
               );
               
    return arrayCleaned;
    }

    returnMasCuckies()
    {
        return document.cookie.split(';');
    }

}
