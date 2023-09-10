<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Form;
use App\Models\FormCategory;
use App\Models\FormModel;
use App\Models\FormProduct;
use App\Models\Page;
use App\Models\Settings;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;


class PageController extends Controller
{

    public function index(Request $request, $id = 0)
    {

        $settings = Settings::allSettings()->pluck('value', 'name');
        $txt = $request->search;
        $pages = Page::getPages($txt, true, $id);
        $pagesPopular = Page::pagesPopular();
        $category = Category::getCategorysType(1);
        $all_data = ['pages' => $pages, 'pagesPopular' => $pagesPopular, 'settings' => $settings, 'category' => $category];
        return view('Front.page')->with('data', $all_data);
    }

    public function pageText($id,$slug = null)
    {
        $category = Category::getCategorysType(1);
        $FormCategory = FormCategory::orderBy('sort', 'ASC')->get();
        $FormModel = FormModel::orderBy('sort', 'ASC')->get();
        $FormProduct = FormProduct::orderBy('sort', 'ASC')->get();
        $Colors = Color::orderBy('sort', 'ASC')->get();
        $page = Page::getpage($id, $slug);
        $settings = Settings::allSettings()->pluck('value', 'name');
//        ================for seo global==============
        if (isset($page->titleSeoPage)){SEOMeta::setTitle($page['titleSeoPage']);}
        SEOMeta::setDescription($page['descriptionSepPage']);
        if (isset($page['multiKeywordsSeoPage'])){SEOMeta::setKeywords ([$page['multiKeywordsSeoPage']]);}
        SEOMeta::setCanonical(url()->current());
//        ================for seo global============

//        ================for google================

        $urlLogo=$settings['domainSite'] .'/'. $settings['loader'];
        if (isset($settings['descriptionSite'])){OpenGraph::setDescription($settings['descriptionSite']);}
        if (isset($page['titleSeoPage'])){OpenGraph::setTitle($page['titleSeoPage']);}
        if (isset($page['nameSite'])){OpenGraph::addProperty('site_name', $page['nameSite']);}
        OpenGraph::setUrl(url()->current());
        OpenGraph::addImage(['url' => $urlLogo, 'size' => 300]);
        OpenGraph::addImage($urlLogo, ['type'=>'image/jpg','height' => 150, 'width' => 49]);
//        ================for google================


//         ===============form dynamic =================
        $selectedIdsArray = explode(',', $page->forms);
        $newArray = array_values($selectedIdsArray);
// تبدیل داده به یک رشته JSON معتب
        $jsonData = json_encode($newArray);
        // جستجوی مقادیر در فیلد JSON با استفاده از whereJsonContains

        $FormField = Form::where('fields', '!=', null)
         ->where(function ($query) use ($jsonData) {
             $query->whereIn('id', json_decode($jsonData, true));
         })
         ->whereNull('deleted_at')
         ->get(['id', 'name', 'description', 'fields']);

         $form = [];
         foreach ($FormField as $rowData) {
                $formData = json_decode($rowData->fields, true);
                $form[$rowData->id] = '<form method="POST" class="formDynamic my-3 form auth-inner" id="FormActivationHamta" action="/saveFormDynamic">';
                $form[$rowData->id] .= '<div class="formCustom">';

                $form[$rowData->id] .= @csrf_field(); // اضافه کردن توکن CSRF
                $form[$rowData->id] .= '<input type="hidden"  hidden name="formId" value="' . $rowData->id . '">';//FormID
                 $form[$rowData->id] .= '<div class="row">';
                foreach ($formData as $field) {
                    if (!array_key_exists('label', $field)) {
                        continue;
                    }

                    if (!array_key_exists('name', $field)) {
                        $field['name'] = '';
                    }

                    if (!array_key_exists('value', $field)) {
                        $field['value'] = '';
                    }

                    $inputClasses = 'form-control';
                    if (in_array($field['type'], ['checkbox-group', 'radio-group'])) {
                        $inputClasses = 'form-check-input';
                    }
                    if (array_key_exists('className', $field)) {
                        $inputClasses .= ' ' . $field['className'];
                    }
                       if ($field['type'] === 'header') {
                        $form[$rowData->id] .= '<' . $field['subtype'] . '>' . $field['label'] . '</' . $field['subtype'] . '>';
                    }
                    else {
                        $isRequired = array_key_exists('required', $field) && $field['required'] ? 'required' : '';
                        $form[$rowData->id] .= '<div class="mb-3 col-12  col-sm-12 col-md-6 col-lg-6 ">';
                        $form[$rowData->id] .= '<label for="' . $field['name'] . '" class="form-label">' . $field['label'] . ($isRequired ? '<span class="text-danger">*</span>' : '') . '</label>';
                        switch ($field['type']) {
                            case 'text':
                            case 'email':
                            case 'number':
                            case 'password':
                                $form[$rowData->id] .= '<input type="' . $field['type'] . '" name="' . $field['name'] . '" id="' . $field['name'] . '" ' . $isRequired . ' class="' . $inputClasses . '">';
                                break;
                            case 'textarea':

                                $form[$rowData->id] .= '<textarea name="' . $field['name'] . '" id="' . $field['name'] . '" ' . $isRequired . ' class="' . $inputClasses . '"></textarea>';
                                break;

                            case 'hidden':
                                $form[$rowData->id] .= '<input type="hidden" name="' . $field['name'] . '" id="' . $field['name'] . '" value="' . $field['value'] . '">';
                                break;
                            case 'file':
                                $form[$rowData->id] .= '<input type="file" name="' . $field['name'] . '" id="' . $field['name'] . '" ' . $isRequired . ' class="' . $inputClasses . '" ' . ($field['multiple'] ? 'multiple' : '') . '>';
                                break;
                            case 'select':
                                $select = '<select name="' . $field['name'] . '" id="' . $field['name'] . '" ' . $isRequired . ' class="' . $inputClasses . '" ' . ($field['multiple'] ? 'multiple' : '') . '>';
                                foreach ($field['values'] as $option) {
                                    $select .= '<option value="' . $option['value'] . '"' . ($option['selected'] ? ' selected' : '') . '>' . $option['label'] . '</option>';
                                }
                                $select .= '</select>';
                                $form[$rowData->id] .= $select;
                                break;
                            case 'radio-group':
                                foreach ($field['values'] as $option) {
                                    $form[$rowData->id] .= '<div class="form-check' . ($field['inline'] ? ' form-check-inline' : '') . '">';
                                    $form[$rowData->id] .= '<input type="radio" name="' . $field['name'] . '" id="' . $field['name'] . '-' . $option['value'] . '" value="' . $option['value'] . '" ' . $isRequired . ' class="' . $inputClasses . '"' . ($option['selected'] ? ' checked' : '') . '>';
                                    $form[$rowData->id] .= '<label class="form-check-label" for="' . $field['name'] . '-' . $option['value'] . '">' . $option['label'] . '</label>';
                                    $form[$rowData->id] .= '</div>';
                                }
                                break;
                            case 'checkbox-group':
                                foreach ($field['values'] as $option) {
                                    $form[$rowData->id] .= '<div class="form-check' . ($field['inline'] ? ' form-check-inline' : '') . '">';
                                    $form[$rowData->id] .= '<input type="checkbox" name="' . $field['name'] . '[]" id="' . $field['name'] . '-' . $option['value'] . '" value="' . $option['value'] . '" ' . $isRequired . ' class="' . $inputClasses . '"' . ($option['selected'] ? ' checked' : '') . '>';
                                    $form[$rowData->id] .= '<label class="form-check-label" for="' . $field['name'] . '-' . $option['value'] . '">' . $option['label'] . '</label>';
                                    $form[$rowData->id] .= '</div>';
                                }
                                break;
                        }
                        $form[$rowData->id] .= '</div>';

                    }
                }
             $form[$rowData->id] .= '</div>';
                $form[$rowData->id] .= '<button type="submit" class="btn btn-outline-primary text-center d-flex justify-content-center mx-auto">ارسال</button>';
                $form[$rowData->id] .= '</div>';
                $form[$rowData->id] .= '</form>';
            }
         //         ===============form dynamic =================
        $settings = Settings::allSettings()->pluck('value', 'name');
        $page->update(['visit' => $page->visit + 1]);
        $pagesPopular = Page::pagesPopular();
        $all_data = [
            'page' => $page,
            'pagesPopular' => $pagesPopular,
            'category' => $category,
            'settings' => $settings,
            'FormCategory' => $FormCategory,
            'Form' => $form,
            'FormModel' => $FormModel,
            'FormProduct' => $FormProduct,
        ];
        return view('Front.pageSingle')->with('data', $all_data);
    }

}
