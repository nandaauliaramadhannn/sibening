<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function sidata()
    {
        return $this->hasMany(SiData::class);
    }
}
