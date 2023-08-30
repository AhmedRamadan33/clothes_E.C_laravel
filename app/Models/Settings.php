<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','logo','favicon','email','phone','address','facebook','twitter','instagram','youtube','tiktok'];
    protected $table = 'settings';
}
