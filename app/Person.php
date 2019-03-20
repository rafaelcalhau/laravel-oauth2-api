<?php

namespace App;

use SimpleXMLElement;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable('persons');
    }

    /**
     * Returns all phone numbers from selected person.
     *
     * @return void
     */
    public function phones()
    {
        return $this->hasMany( 'App\Phone', 'person_id' );    
    }

    /**
     * Create a new record and returns the ID.
     *
     * @param SimpleXMLElement $data
     * @return integer
     */
    public function saveRecord(SimpleXMLElement $data)
    {
        $this->name = $data->personname;
        $this->save();

        $id = $this->id;

        if (isset( $data->phones->phone )) {
            foreach ($data->phones->phone as $number) {
                $phone = new Phone();
                $phone->person_id = $id;
                $phone->number = $number;
                $phone->save();
            }
        }

        return true;      
    }
}
