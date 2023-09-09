<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "ed_date" => "required|max:255",
            "university" => "required|max:255",
            "department" => "required|max:255",
        ];
    }
    public function messages()
    {
        return [
            'ed_date.required' => "Eğitim tarihi girilmesi zorunludur",
            'ed_date.max' => "Eğitim tarihi alanı için max 255 karakter girebilirsiniz",
            'university.required' => "Üniversite adı girilmesi zorunludur",
            'university.max' => "Üniversite alanı için max 255 karakter girebilirsiniz",
            'department.required' => "Üniversite bölümü girilmesi zorunludur",
            'department.max' => "Üniversite bölümü alanı için max 255 karakter girebilirsiniz",
        ];
    }
}
