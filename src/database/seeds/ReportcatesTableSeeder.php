<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ReportcatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'rc_name' => '実装',
                'rc_note' => '',
                'rc_list_flg' => '1',
                'rc_order' => '1'
            ],
            [
                'rc_name' => '打合せ',
                'rc_note' => '',
                'rc_list_flg' => '1',
                'rc_order' => '2'
            ],
            [
                'rc_name' => '資料作成',
                'rc_note' => '',
                'rc_list_flg' => '1',
                'rc_order' => '3'
            ],
            [
                'rc_name' => '顧客対応',
                'rc_note' => '',
                'rc_list_flg' => '1',
                'rc_order' => '4'
            ],
            [
                'rc_name' => '設計',
                'rc_note' => '',
                'rc_list_flg' => '1',
                'rc_order' => '5'
            ],
            [
                'rc_name' => 'その他',
                'rc_note' => '',
                'rc_list_flg' => '1',
                'rc_order' => '6'
            ],
        ];

        foreach ($datas as $key => $data) {
            DB::table('reportcates')->insert([
                'rc_name' => $data['rc_name'],
                'rc_note' => $data['rc_note'],
                'rc_list_flg' => $data['rc_list_flg'],
                'rc_order' => $data['rc_order'],
            ]);
        }
    }
}
