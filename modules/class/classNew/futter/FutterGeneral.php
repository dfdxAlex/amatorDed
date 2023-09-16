<?php
namespace class\classNew\futter;

use \class\classNew\futter\forFutterGeneral\VievStatisticFooter;
use \src\clas\forIPCalculator\ManagerButtonMat;
use \src\clas\forIPCalculator\ManagerButtonStatistic;
use \src\clas\forIPCalculator\StartFooterContainer;

class FutterGeneral
{
    public function __construct(string $metka)
    {
        new StartFooterContainer();
        ManagerButtonStatistic::managerButtonStatistic();
        ManagerButtonMat::redaktorForMat();
        new VievStatisticFooter($metka);
    }
}
