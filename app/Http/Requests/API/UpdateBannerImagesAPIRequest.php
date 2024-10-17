<?php

namespace App\Http\Requests\API;

use App\Models\BannerImages;
use InfyOm\Generator\Request\APIRequest;

class UpdateBannerImagesAPIRequest extends APIRequest
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
        $rules = BannerImages::$rules;
        
        return $rules;
    }
}
