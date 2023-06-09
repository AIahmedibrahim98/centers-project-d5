<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name','tax_numebr','owner'];
    public function branches()
    {
        return $this->hasMany(Branch::class,'company_id','id');
    }

    public function maneger()
    {
        return $this->hasOne(Maneger::class);
    }
}
