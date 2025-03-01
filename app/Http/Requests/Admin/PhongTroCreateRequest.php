<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PhongTroCreateRequest extends FormRequest
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
            'name'               => 'required|max:255',
            'slug'               => 'required|max:255|unique:phongtro,slug',
            'dien_tich'          => 'required|integer|min:1',
            'gia_tien'           => 'required|numeric|min:0',
            'content'            => 'nullable|string',
            'thanh_pho_id'       => 'required|integer|exists:Provinces,id',
            'huyen_id'           => 'required|integer|exists:Districts,id',
            'xa_id'              => 'required|integer|exists:Wards,id',
            'tien_coc'           => 'required|numeric|min:0',
            'thoi_han_hop_dong'  => 'required|integer|min:1',
            'is_active'          => 'nullable',
            'is_show_home'       => 'nullable',
            'category_id'        =>  'required|exists:category,id', 
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'                 => 'Tên không được để trống.',
            'name.max'                      => 'Tên không được quá 255 ký tự.',
            'slug.required'                 => 'Slug không được để trống.',
            'slug.unique'                   => 'Slug đã tồn tại, vui lòng chọn slug khác.',
            'dien_tich.required'            => 'Diện tích không được để trống.',
            'dien_tich.integer'             => 'Diện tích phải là số nguyên.',
            'dien_tich.min'                 => 'Diện tích phải lớn hơn 0.',
            'gia_tien.required'             => 'Giá tiền không được để trống.',
            'gia_tien.numeric'              => 'Giá tiền phải là số.',
            'gia_tien.min'                  => 'Giá tiền không hợp lệ.',
            'content.string'                => 'Nội dung không hợp lệ.',
            'thanh_pho_id.required'         => 'Bạn chưa chọn thành phố.',
            'thanh_pho_id.exists'           => 'Thành phố không hợp lệ.',
            'thanh_pho_id.integer'          =>'Thành phố phải là số nguyên',
            'huyen_id.required'             => 'Bạn chưa chọn huyện.',
            'huyen_id.exists'               => 'Huyện không hợp lệ.',
            'huyen_id.integer'              =>'Huyện phải là số nguyên',
            'xa_id.required'                => 'Bạn chưa chọn xã.',
            'xa_id.exists'                  => 'Xã không hợp lệ.',
            'xa_id.integer'                 =>'Xã phải là số nguyên',
            'tien_coc.required'             => 'Tiền cọc không được để trống.',
            'tien_coc.numeric'              => 'Tiền cọc phải là số.',
            'tien_coc.min'                  => 'Tiền cọc không hợp lệ.',
            'thoi_han_hop_dong.required'    => 'Thời hạn hợp đồng không được để trống.',
            'thoi_han_hop_dong.integer'     => 'Thời hạn hợp đồng phải là số nguyên.',
            'thoi_han_hop_dong.min'         => 'Thời hạn hợp đồng phải lớn hơn 0.',
            'image.required'                => 'Ảnh không được để trống.',
            'image.image'                   => 'Tệp tải lên phải là ảnh.',
            'image.mimes'                   => 'Ảnh phải có định dạng jpeg, png, jpg, gif.',
            'image.max'                     => 'Ảnh không được lớn hơn 2MB.',
            // 'category_id.required'          => 'Bạn chưa chọn danh mục.',
            // 'category_id.exists'            => 'Danh mục không hợp lệ.',
            // 'category_id.integer'           =>'Danh mục phải là số nguyên',
        ];
    }
}
