<?php

namespace Zhengwhizz\CustomizedForm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedFormTemplate as CustomizedFormTemplateContract;

class CustomizedFormTemplate extends Model implements CustomizedFormTemplateContract
{
    protected $fillable = [
        'name',
        'content',
        'active',
    ];

    public function __construct()
    {
        $this->setTable(config('customized_form.table_names.template'));
    }
    public function forms(): HasMany
    {
        return $this->hasMany(
            config('customized_form.models.form'),
            'template_id'
        );
    }
}
