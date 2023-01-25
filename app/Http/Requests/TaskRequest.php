<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            // untuk validasi data harus diisi
            'task' => ['required'],
            'user' => ['required']
        ];
        
    }

    public function messages()
    {
        return [
            'required' => 'isian :attribute harus di isi',
            'user.required' => 'nama pengguna harus di isi'
        ];
    }
}
