<?php
namespace class\nonBD\propertyContainers;
/**refactoring 16.09.2023 */
class PropertyContainerSinglton extends PropertyContainer
{

        private static $instances = null;
        protected function __construct() { }
        protected function __clone() { }

        public function __wakeup()
        {
            throw new \Exception("Cannot unserialize a singleton.");
        }
        
        public static function getInstance(): PropertyContainerSinglton   // kill
        {
            if (is_null(self::$instances)) {
                self::$instances = new self();
            }
            return self::$instances;
        }
}
