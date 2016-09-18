<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FlyerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'street' => 'required|max:255',
            'city' => 'required|max:255',
            'zip' => 'required|max:255',
            'state' => 'required',
            'country' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'street.required' => 'Hãy nhập tên đường',
            'city.required' => 'Hãy nhập tên thành phố',
            'zip.required' => 'Hãy nhập zip/postal code',
            'country.required' => 'Hãy nhập tên quốc gia',
            'state.required' => 'Hãy nhập tên quốc gia',
            'price.required' => 'Hãy nhập giá chào bán',
            'description.required' => 'Mô tả nhà là cần thiết cho người mua',
        ];
    }
}
