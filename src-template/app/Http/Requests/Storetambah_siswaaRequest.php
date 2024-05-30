<?php

namespace App\Http\Requests;

use App\Models\Tambah_siswaa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTambah_siswaaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tambah_siswaa_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'stock' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}