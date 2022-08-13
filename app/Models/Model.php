<?php

namespace App\Models;

use App\Scopes\Company;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Model extends Eloquent
{
    use HasFactory;
    protected $tenantable = true;

    protected $dates = ['deleted_at'];

    protected $casts = [
        'active' => 'boolean',
    ];


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new Company);
    }


    public function company()
    {
        return $this->belongsTo('App\Models\Common\Company');
    }


    public function scopeCompanyId($query, $company_id)
    {
        return $query->where($this->table . '.company_id', '=', $company_id);
    }



    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }


    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }
}
