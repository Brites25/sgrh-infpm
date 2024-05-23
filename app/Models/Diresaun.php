<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diresaun extends Model
{
    use HasFactory;
    protected $table = 'diresaun';
    protected $primaryKey = 'id_diresaun';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];
}
