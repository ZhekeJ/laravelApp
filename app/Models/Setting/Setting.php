<?php

namespace App\Models\Setting;

use App\Scopes\Company;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Setting extends Eloquent
{


    protected $table = 'settings';

    protected $tenantable = true;

    public $timestamps = false;


    protected $fillable = ['company_id', 'key', 'value'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new Company);
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Common\Company');
    }


    public function scopePrefix($query, $prefix = 'company')
    {
        return $query->where('key', 'like', $prefix . '.%');
    }


    public function scopeCompanyId($query, $company_id)
    {
        return $query->where($this->table . '.company_id', '=', $company_id);
    }
}
