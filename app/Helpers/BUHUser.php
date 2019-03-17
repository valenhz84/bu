<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class BUHUser {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function get_userfirstname($id) {
        $user = DB::table('users')->where('id', $id)->first();
         
        return (isset($user->firstname) ? $user->firstname : '');
    }
}