<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable( 'oauth_clients' );
    }
}
