<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Eloquent
{
    use  SoftDeletes;

    protected $table = 'companies';

    protected $tenantable = false;

    protected $dates = ['deleted_at'];

    protected $fillable = ['domain', 'enabled'];

    protected $casts = [
        'enabled' => 'boolean',
    ];


    public $sortable = ['name', 'domain', 'email', 'enabled', 'created_at'];

    public static function boot()
    {
        parent::boot();

        static::retrieved(function ($model) {
            $model->setSettings();
        });

        static::saving(function ($model) {
            $model->unsetSettings();
        });
    }

    public function settings()
    {
        return $this->hasMany('App\Models\Setting\Setting');
    }


    public function users()
    {
        return $this->morphedByMany('App\Models\Auth\User', 'user', 'user_companies', 'company_id', 'user_id');
    }


    public function setSettings()
    {
        $settings = $this->settings;

        $groups = [
            'company',
            'default',
        ];

        foreach ($settings as $setting) {
            list($group, $key) = explode('.', $setting->getAttribute('key'));

            // Load only general settings
            if (!in_array($group, $groups)) {
                continue;
            }

            $value = $setting->getAttribute('value');

            if (($key == 'logo') && empty($value)) {
                $value = 'public/img/company.png';
            }

            $this->setAttribute($key, $value);
        }

        // Set default default company logo if empty
        if ($this->getAttribute('logo') == '') {
            $this->setAttribute('logo', 'public/img/company.png');
        }
    }

    public function unsetSettings()
    {
        $settings = $this->settings;

        $groups = [
            'company',
            'default',
        ];

        foreach ($settings as $setting) {
            list($group, $key) = explode('.', $setting->getAttribute('key'));

            // Load only general settings
            if (!in_array($group, $groups)) {
                continue;
            }

            $this->offsetUnset($key);
        }

        $this->offsetUnset('logo');
    }


    public function scopeCollect($query, $sort = 'name')
    {
        $request = request();

        $search = $request->get('search');
        $limit = $request->get('limit', setting('default.list_limit', '25'));

        return user()->companies();
    }


    public function scopeEnabled($query, $value = 1)
    {
        return $query->where('active', $value);
    }



    public function emailSortable($query, $direction)
    {
        return $query->join('settings', 'companies.id', '=', 'settings.company_id')
            ->where('key', 'company.email')
            ->orderBy('value', $direction)
            ->select('companies.*');
    }


    public function scopeAutocomplete($query, $filter)
    {
        return $query->join('settings', 'companies.id', '=', 'settings.company_id')
            ->where(function ($query) use ($filter) {
                foreach ($filter as $key => $value) {
                    $column = $key;

                    if (!in_array($key, $this->fillable)) {
                        $column = 'company.' . $key;
                        $query->orWhere('key', $column);
                        $query->Where('value', 'LIKE', "%" . $value  . "%");
                    } else {
                        $query->orWhere($column, 'LIKE', "%" . $value  . "%");
                    }
                }
            })
            ->select('companies.*');
    }


    public function getCompanyLogoAttribute()
    {
        return $this->getMedia('company_logo')->last();
    }
}
