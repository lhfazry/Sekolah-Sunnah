<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\School;

class UpdateSchoolRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\App\Models\Role::isAdmin()) {
            return true;
        }

        $id = $this->route('id');
        $school = \App\Models\School::find($id);

        if(!empty($school)) {
            if($school->creator->id == auth()->user()->id) {
                if(!$school->isVerified()) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return School::$rules;
    }
}
