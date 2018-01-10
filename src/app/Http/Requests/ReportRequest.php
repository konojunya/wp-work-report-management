<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'rp_date' => 'required|date',
            'rp_time_from' => 'required|date_format:H:i',
            'rp_time_to' => 'required|date_format:H:i',
            'reportcate_id' => 'required|integer',
            'rp_content' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'rp_date.required' => '作業日を入力してください。',
            'rp_date.date' => '2017-10-10のフォーマットで入力してください。',
            'rp_time_from.required' => '作業開始時間を入力してください。',
            'rp_time_from.date_format' => '21:30のフォーマットで入力してください。',
            'rp_time_to.required' => '作業終了時間を入力してください。',
            'rp_time_to.date_format' => '21:30のフォーマットで入力してください。',
            'reportcate_id.required' => '作業種類IDを選択してください。',
            'reportcate_id.integer' => '不正な値です',
            'rp_content.required' => '作業内容を入力してください。',
            'rp_content.string' => '不正な値です',
        ];
    }
}
