<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','logo','website'];


    protected static function boot() {
        parent::boot();
        static::deleted(function(Company $company){
            if (File::exists(public_path($company->logo))) {
                File::delete(public_path($company->logo));
            }
        });
    }

    public function getLogoAttribute($value){
        return url(str_replace('public/','',$value));
    }

    public function employees(){
        return $this->hasMany(Employee::class,'company_id');
    }
}
