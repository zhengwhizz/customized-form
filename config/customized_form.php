<?php

return [

    'models' => [

        /*
         * The model you want to use as a CustomizedForm model needs to implement the
         * `Zhengwhizz\CustomizedForm\Contracts\CustomizedForm` contract.
         */

        'form' => Zhengwhizz\CustomizedForm\Models\CustomizedForm::class,
        'template' => Zhengwhizz\CustomizedForm\Models\CustomizedFormTemplate::class,
    ],

    'table_names' => [
        'form' => 'customized_form_forms',
        'template' => 'customized_form_templates',
    ],

];
