<?php

namespace App\Http\Requests\Api\Link;

use App\Http\Requests\Api\FormRequest;

class LinkStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'link' => 'required|url|unique:links,link',
            'local_link' => 'required|url|unique:links,local_link',
        ];
    }
}
