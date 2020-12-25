<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|min:8|max:10',
                'address' => 'required|max:255',
            //
        ];
    }
    public function messages(){
       $messages = [
        'name.required' => 'Khong duoc de trong ten',
        'email.required' => 'Nhap cai email vao',
        'email.email' => 'Email khong dung dinh dang',
        'phone.required' => 'Khong duoc de trong',
        'phone.min' => 'Sdt can lon hon 8 ki tu',
        'phone.max' => 'Sdt khong duoc lon hon 10 ki tu',
        'address.required' => 'Nhap dia chi vao',
        'address.max' => 'Dia chi deo gi dai the'
        ];
        return $messages;
        }
}
