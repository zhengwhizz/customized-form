<?php
namespace Zhengwhizz\CustomizedForm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedForm as FormContract;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedFormTemplate as TemplateContract;
use Zhengwhizz\CustomizedForm\Http\Resources\FormResource;

class CustomizedFormController extends Controller
{

    /**
     * 获取保存的表单列表
     *
     * @param Request $request
     * @param FormContract $formClass
     * @param TemplateContract $templateClass
     * @return void
     */
    public function index(Request $request, FormContract $formClass, TemplateContract $templateClass)
    {
        $template_id = $request->template_id;
        $builder = $formClass;
        if ($template_id) {
            $builder = $templateClass->findOrFail($template_id)->forms()->with('template');
        }
        $data = $builder->with('template')->get();
        if ($request->expectsJson()) {
            return FormResource::collection($data);
        }
        return $data;
    }

    /**
     * 保存录入的表单
     *
     * @param Request $request
     * @param FormContract $formClass
     * @return void
     */
    public function store(Request $request, FormContract $formClass)
    {
        $formClass->fill($request->all())->save();
        return ['code' => true];
    }

}
