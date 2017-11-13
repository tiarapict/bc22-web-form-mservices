<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomDeclarationGoods extends Model
{
    protected $table = 'customs_declaration_goods';
    protected $fillable = [
        'cd_id', 'goods_description', 'goods_quantity', 'goods_value'
    ];
}
