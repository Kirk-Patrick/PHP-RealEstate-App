<?php
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/RegistrationClass.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/Location.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/Property.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/RegisterVal.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/LocationVal.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/PropertyVal.php';
/**
 * Validation short summary.
 *class use to keep track of validations application wide
 * Validation description.
 *
 * @version 1.0
 * @author kirk
 */
class Validation
{
    private $registerVal;
    private $locationVal;
    private $propertyVal;

   public function __construct()
   {
       $this->registerVal = new RegisterVal();
       $this->locationVal= new LocationVal();
       $this->propertyVal= new PropertyVal();

   }

   public function validate_Registration(RegistrationClass &$regObject)
   {
       $this->registerVal->doValidation($regObject); // do validation in the object
   }

   public function validate_Location(Location &$locObj)
   {
       $this->locationVal->doValidation($locObj); // do validation in the object
   }
   public function validate_Property(Property &$propObject)
   {
       $this->propertyVal->doValidation($propObject);
   }
   public function getRegValObj()
   {
       return $this->registerVal;
   }

   public function getLocValObj()
   {
       return $this->locationVal;
   }
   public function getLPropValObj()
   {
       return $this->propertyVal;
   }




}