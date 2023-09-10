<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationHamtaUssd extends Model
{
    use HasFactory;
    protected $table = 'register_codes_ussd';
    protected $fillable =['id','Mobile','Imei','Status'];
}
