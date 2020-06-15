<?php

namespace Zhengwhizz\CustomizedForm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedForm as CustomizedFormContract;

class CustomizedForm extends Model implements CustomizedFormContract
{
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
}
