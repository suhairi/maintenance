<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LaporanRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->level->id == 4)
            return true;
        else
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tarikh'                => 'required|date',
            'nama'                  => 'required|exists:user',
            'pelapor'               => 'required',
            'cawangan_id'           => 'required|integer',
            'peralatan_id'          => 'required|integer',
            'noSiri'                => 'required|min:6',
            'ringkasanKerosakan'    => 'required|min:8'
        ];
    }
}
