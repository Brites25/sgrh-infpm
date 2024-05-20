<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Munisipiu extends Model
{
    use HasFactory;
    protected $table = 'munisipiu';
    protected $primaryKey = 'id_munisipiu';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
}
