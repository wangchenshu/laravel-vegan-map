<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithValidation;

HeadingRowFormatter::
    default('none');

class MembersImport implements ToModel, WithHeadingRow, WithValidation
{

    public $typeMapping;

    function __construct()
    {
        $this->typeMapping = array(
            "一般戶" => "NORMAL",
            "低收" => "LOW_INCOME",
            "中低收" => "MIDDLE_INCOME",
            "自費" => "OWN_EXPENSE",
        );
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!Member::where('id_number', $row['身分證字號'])->exists()) {
            return new Member([
                'name' => $row['姓名'],
                'id_number' => $row['身分證字號'],
                'address' => $row['地址'],
                'type' => $this->typeMapping[$row['身份別']],
                'contact_person_cellphone' => $row['聯絡人電話'],
                'contact_person' => $row['聯絡人姓名'],
                'cellphone' => '',
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '姓名' => 'required|string',
            'id_number' => 'unique:members',
            '地址' => 'required',
            '身份別' => 'required',
            '聯絡人電話' => 'required',
            '聯絡人姓名' => 'required',
        ];
    }
}
