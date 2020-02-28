<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

class UserOnlineModel extends Model
{
    protected $table = 'user_onlines';
    public $primaryKey = 'uo_id';
    public $timestamps = false;
    protected $fillable = [
        'uo_session', 'uo_time', 'uo_active',
    ];

    /**
     * Run process
     * return array.
     */
    public function runSessionUserOnline()
    {
        $session_id = session_id();
        $time = time();
        $time_check = $time - 600;

        if ($this->findSession($session_id)) {
            $this->updateTimeUserOld($session_id, $time);
        } else {
            $this->insertUserOnline($session_id, $time);
        }

        $this->userOffline($time_check);

        return [$this->getUserOnline(), $this->getUserOnlineToday(), $this->getUOHistory()];
    }

    /**
     * Query_set kiểm tra session tồn tại
     * return bool.
     */
    private function findSession($session_id)
    {
        $exist_check = $this->where('uo_session', $session_id)->count();
        if ($exist_check == 0) {
            return false;
        }

        return true;
    }

    /**
     * Query_set thêm lượt truy cập mới
     * return void.
     */
    private function insertUserOnline($session_id, $time)
    {
        $User_ol = new UserOnlineModel();
        $User_ol->uo_session = $session_id;
        $User_ol->uo_time = $time;
        $User_ol->uo_active = 0;
        $User_ol->save();
    }

    /**
     * Query_set cập nhật lại thời gian user_online
     * return void.
     */
    private function updateTimeUserOld($session_id, $time)
    {
        $User_ol = $this->where('uo_session', $session_id)->first();
        $User_ol->uo_time = $time;
        $User_ol->save();
    }

    /**
     * Query_set cập nhật user đã offline
     * return void.
     */
    private function userOffline($time_check)
    {
        $this->where('uo_time', '<', $time_check)->update(['uo_active' => 1]);
    }

    /**
     * Query_set lấy tất cả người dùng đang online
     * return int.
     */
    private function getUserOnline()
    {
        return $this->where('uo_active', 0)->count();
    }

    /**
     * Query_set lấy tất cả người dùng đang online hôm nay
     * return int.
     */
    private function getUserOnlineToday()
    {
        $today_s = strtotime(date('Y-m-d 0:0:0'));
        $today_e = strtotime(date('Y-m-d 23:59:59'));

        return $this->where('uo_time', '<', $today_e)->where('uo_time', '>', $today_s)->count();
    }

    /**
     * Query_set lấy lịch sử tổng số lượng truy cập
     * return int.
     */
    private function getUOHistory()
    {
        return $this->all()->count();
    }
}
