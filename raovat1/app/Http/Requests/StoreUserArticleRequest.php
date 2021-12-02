<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidDateRule;
class StoreUserArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'valid_date' => new ValidDateRule(),
        ];
    }
}
