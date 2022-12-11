<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
            "place.name" => ["required"],
            "place.address" => ["required"],
            "place.tel" => ["required"],
            "place.lat" => ["required"],
            "place.lng" => ["required"],
            "place.detail" => ["required"],
            "review" => ["required"],
            "place.category_id" => ["required"]
        ];
    }
}
