<?php

namespace Zhengwhizz\CustomizedForm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedForm as CustomizedFormContract;

class CustomizedForm extends Model implements CustomizedFormContract
{
    protected $fillable = [
        'template_id',
        'placeholder_data',
        'form_data',
    ];

    protected $casts = [
        'placeholder_data' => 'json',
        'form_data' => 'json',
    ];

    protected $appends = [
        // 'html',
    ];

    public function __construct()
    {
        $this->setTable(config('customized_form.table_names.form'));
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(
            config('customized_form.models.template'),
            'template_id',
            'id'
        );
    }

    // public function getHtmlAttribute()
    // {
    //     // dd(array_keys(config('customized_form.placeholders')), array_values($this->placeholder_data));
    //     return preg_replace(array_keys($this->placeholder_data), array_values($this->placeholder_data), $this->content);
    // }

}
