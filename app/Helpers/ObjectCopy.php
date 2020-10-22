<?php

namespace App\Helpers;

class ObjectCopy
{

    public function importObject($object)
    {
        foreach (get_object_vars($object) as $key => $value) {
            $this->$key = $value;
        }
    }

    public function importArray($array){
        foreach ($array as $key => $value) {
          $this->$key = $value;
        }
    }

}
