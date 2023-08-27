/**
 * функция раскодирует строку из юникода(UTF-8) в текст
 */

function deCoderIntToUTF8(str)
{
    masStr = str.split('_');
    let rez='';

    masStr.forEach(element => {
        rez += String.fromCharCode(element);
    });

    return rez;
}
