<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomsDeclaration extends Model
{
    protected $table = 'customs_declaration';
    protected $fillable = [
        'cd_id', 'cd_arrival_date', 'cd_voyage_number', 'cd_full_name', 'cd_nationality', 'cd_passport_number', 
        'cd_occupation', 'cd_address_in', 'cd_accompanying', 'cd_accompanied_baggages', 'cd_email'
    ];
}
