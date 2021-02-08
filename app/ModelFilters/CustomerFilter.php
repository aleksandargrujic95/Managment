<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CustomerFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function name($name)
    {
        return $this->where('name', 'LIKE', "%$name%");
    }

    public function phoneNumber($phone)
    {
        return $this->where('phone_number', 'LIKE', "$phone%");
    }

    public function jbk($jbk)
    {
        return $this->where('jbk', 'LIKE', "$jbk%");
    }

    public function address($address)
    {
        return $this->where('address', 'LIKE', "%$address%");
    }
}
