<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class admin_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
	        'name'              => 'is-admin',
	        'display_name' 			=> 'Là Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
        DB::table('permissions')->insert([
	        'name'              => 'is-shipper',
	        'display_name' 			=> 'Là Shipper',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
        DB::table('permissions')->insert([
	        'name'              => 'user-list',
	        'display_name' 			=> 'Danh Sách Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'user-add',
	        'display_name' 			=> 'Thêm Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'user-edit',
	        'display_name' 			=> 'Sửa Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'user-delete',
	        'display_name' 			=> 'Xóa Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);

	    DB::table('permissions')->insert([
	        'name'              => 'role-list',
	        'display_name' 			=> 'danh sách Quyền',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'role-add',
	        'display_name' 			=> 'Thêm Quyền',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'role-edit',
	        'display_name' 			=> 'Sửa Quyền',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'role-delete',
	        'display_name' 			=> 'Xóa Quyền',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
        $id = DB::table('users')->insertGetId([
            'name'              => 'admin',
            'email'             => 'admin@admin.com',
            'password'          => Hash::make('12345678'),
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('user_detail')->insertGetId([
            'users_id'              => $id,
        ]);


        
    }
}
