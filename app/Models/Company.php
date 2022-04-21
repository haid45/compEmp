<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Company extends Model
{
    use HasFactory;

    protected static function boot() {
        parent::boot();
        static::deleted(function(Company $company){
            if (File::exists(public_path($company->logo))) {
                File::delete(public_path($company->logo));
            }
        });
    }
}
