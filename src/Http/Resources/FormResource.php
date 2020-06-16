<?php

namespace Zhengwhizz\CustomizedForm\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormResource extends JsonResource
{

    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['html'] = $this->whenLoaded('template', function () {
            return replace_placeholder($this->template->content, $this->placeholder_data);
        });
        return $data;
    }

}
