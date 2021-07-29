<?php

namespace App\Models;
use App\Traits\QueryScope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staf_master extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ["name", "email", "password","phone","status","qualification","blood_group","role_id"];


    public function setPasswordAttribute($value)
    {
        $this->attributes["password"] = bcrypt($value);
    }
}
