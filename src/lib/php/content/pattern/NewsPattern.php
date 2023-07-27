<?php
namespace src\lib\php\content\pattern;

class NewsPattern
{
    static public function news()
    {
        if (isset($_GET['patternSipmpleFactory'])) {
            echo 'поймали';
        }
    } 
}
