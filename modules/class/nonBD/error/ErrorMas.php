<?php
namespace class\nonBD\error;

/**
 * Класс выводит ошибки, собравшиеся в другом классе.
 * 
 */

class ErrorMas
{
    private $in;

    public function __construct(\class\nonBD\interface\IErrorMas $in) 
    {
        $this->in = $in;
    }

    public function __toString()
    {
        $rez='';
        if (count($this->in->getMassError())==0) {
            $rez = "<div class='alert alert-success' role='alert'>
                      Operation was successfully completed!
                    </div>";
        } else {
            foreach ($this->in->getMassError() as $key=>$val) {
                $rez.=$this->block($val);
            }
        }

        return $rez;
    }

    public function block($massage)
    {   return "
        <div class='alert alert-danger' role='alert'>
        $massage
        </div>";
    }
}


