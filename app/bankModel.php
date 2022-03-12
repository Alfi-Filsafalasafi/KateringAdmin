<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bankModel extends Model
{
    protected $table = "xref_bank";

    public function bank()
    {
        return $this->belongsTo(bankModel::class);
    }
}
