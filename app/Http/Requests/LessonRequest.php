<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'info' => 'required',
            'img_thumb' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'يجب إضافة عنوان الدرس !',
            'info.required' => 'يجب إضافة وصف أو ملخص قصير للفيديو !',
            'img_thumb.required' => 'يجب إضافة صورة مصغرة للفيديو !',
        ];
    }
}
