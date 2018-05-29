<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(TaxTableSeeder::class);
		$this->call(UserTableSeeder::class);
    }
}
class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('permission')->insert([
          array('PermissionName'=>'Quyền Add User','Description'=>'Quyền Thêm User'),
          array('PermissionName'=>'Quyền Edit User','Description'=>'Quyền Edit User'),
          array('PermissionName'=>'Quyền Delete User','Description'=>'Quyền Delete User'),
          array('PermissionName'=>'Quyền List User','Description'=>'Quyền List User'),
        ]);
    }
}

class RolePermissionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('role_permission')->insert([
            array('RoleId'=>'1','PermissionId'=>'1'),
            array('RoleId'=>'1','PermissionId'=>'2'),
            array('RoleId'=>'1','PermissionId'=>'3'),
            array('RoleId'=>'1','PermissionId'=>'4'),
            array('RoleId'=>'2','PermissionId'=>'1'),
            array('RoleId'=>'2','PermissionId'=>'4'),
        ]);
    }
}
class RoleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('role')->insert([
          array('RoleName'=>'Super Administrator','Description'=>'Người quản trị toàn bộ hệ thống'),
          array('RoleName'=>'Administrator','Description'=>'Người quản trị hệ thống'),
          array('RoleName'=>'Customer Service','Description'=>'Người kích hoạt trạng thái đơn hàng'),
          array('RoleName'=>'Customer Service','Description'=>'Người xem đơn hàng'),
        ]);
    }
}

class TaxTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tax')->insert([
         array('TaxName'=>'VAT','Description'=>'Thuế giá trị gia tăng'),
         array('TaxName'=>'TTĐB','Description'=>'Thuế tiêu thụ đặc biệt'),
         array('TaxName'=>'XNK','Description'=>' Thuế Xuất nhập khẩu'),
        ]);
    }
}

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->insert([
         array('UserName'=>'Super Administrator',
		 'Password'=>'$2y$10$x9ZIswilj5SfEtufwRxfTOsIy.FtFSHeWrValL9uMTPdIb1eGwpve',
		 'Image'=>'image',
		 'Status'=>'1',
		 'Email'=>'superadmin@gmail.com',
		 'Address'=>'nhà na điên',
		 'Birthday'=>'2016-03-03',
		 'Gender'=>'2',
		 'Phone'=>'0000123456',
		 'RoleId'=>'1',
		 ),
		 array('UserName'=>'Administrator',
		 'Password'=>'$2y$10$10ZigQzTNC.f42B78/s3qeWwIh5M4S/oOOjbyrAsh902PrYVYwc1i',
		 'Image'=>'image',
		 'Status'=>'1',
		 'Email'=>'admin@gmail.com',
		 'Address'=>'nhà na điên',
		 'Birthday'=>'2016-03-03',
		 'Gender'=>'0',
		 'Phone'=>'0000123456',
		 'RoleId'=>'2',
		 ),
        ]);
    }
}