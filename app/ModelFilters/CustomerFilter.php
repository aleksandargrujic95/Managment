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

    public function address($address)
    {
        return $this->where('address', 'LIKE', "%$address%");
    }

    public function phoneNumber($phone)
    {
        return $this->where('phone_number', 'LIKE', "%$phone%");
    }

    public function id($id)
    {
        return $this->where('id', $id);
    }


    // public function place($place)
    // {
    //     return $this->where('place', 'LIKE', "%$place%");
    // }

    public function moneySpent($money_spent)
    {
        return $this->where('money_spent', '>=', "$money_spent");
    }

    // public function rentNumber($number_of_rent)
    // {
    //     return $this->where('number_of_rent', '>=', "$number_of_rent");
    // }
}
