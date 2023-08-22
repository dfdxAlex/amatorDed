<?php
namespace class\nonBD\trait;

trait DirectorySep
{
    static public function insertDirectorySeparator($name)
    {
        $hablon='/[^\d\w]/';
        $name=preg_replace($hablon,DIRECTORY_SEPARATOR,$name);
        return $name;
    }
}
