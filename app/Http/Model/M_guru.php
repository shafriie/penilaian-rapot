<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_guru extends Model
{
    protected $table = 'tbl_guru';

    public $timestamps = false;

    protected $primaryKey = 'kode_guru';

}
