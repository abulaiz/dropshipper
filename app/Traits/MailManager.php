<?php namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Auth;

trait MailManager
{
	private $max_Index = 100;

	private $main_folder = 'mail';
	
	public function getPath($flag, $user_id){
		return $this->main_folder. '/' . ( $flag == 'M' ? 'member' : 'admin' ) . '/' . ( $flag == 'M' ? $user_id : '' );
	}

	// $flag : admin / member
	private function getInboxPath($flag, $user_id){
		$path = $this->getPath($flag, $user_id) . '/inbox';
		return $path;
	}

	private function getOutboxPath($flag, $user_id){
		$path = $this->getPath($flag, $user_id);
		$index = $this->readStatus($flag, $user_id, 'outbox', $path);
		$file_s = $path . '/' . $index . '_o.json';
		if(!Storage::exists($file_s))
			Storage::put($file_s , '[]');
		$arr =  json_decode( Storage::get($file_s), true );
		if( count($arr) < $this->max_Index ){
			return $file_s;
		} else {
			$new_path = $path . '/' . ($index + 1) . '_o.json';
			Storage::put($new_path , '[]');
			$this->setStatus( $flag, $user_id, 'outbox', '+1', $path);
			return $new_path;
		}
	}

	// status.json is a file which tell current active file storage
	public function getStatusPath($flag, $user_id, $spath = null){
		$path = ($spath == null ? $this->getPath($flag, $user_id) : $spath);

		$path .= '/status.json';
		if(!Storage::exists($path)){
			$params = ['inbox' => 1, 'outbox' => 1, 'unread' => 0 ];
			Storage::put($path, json_encode($params, JSON_PRETTY_PRINT) );
		}

		return $path;
	}

	// $index = 'inbox' / 'outbox'
	public function readStatus($flag, $user_id, $index, $spath = null){
		$path = $this->getStatusPath($flag, $user_id, $spath);
		$arr = json_decode( Storage::get($path), true );
		return $arr[$index];
	}

	public function setStatus($flag, $user_id, $index, $val ,$spath = null){
		$path = $this->getStatusPath($flag, $user_id, $spath);
		$arr = json_decode( Storage::get($path), true );
		
		if($val[0] == '+')
			$arr[$index] += $val[1];
		elseif($val[0] == '-')
			$arr[$index] -= $val[1];
		else
			$arr[$index] = (int)$val[0];

		Storage::put($path, json_encode($arr, JSON_PRETTY_PRINT) );	
	}

	public function setContent($item, $file_name){
		return [
			'id' => $item['id'],
			'name' => (isset($item['sender_name']) ? $item['sender_name'] : $item['receiper_name']),
			'subject' => $item['subject'],
			'email' => $item['email'],
			'flag' => $item['flag'],
			'file' => $file_name,
			'readed' => $file_name != 'inbox',
			'created_at' => $item['created_at']
		];
	}

	public function markAsReadInbox($flag, $user_id, $mail_id){

		$path = $this->getPath($flag, $user_id);
		$data = json_decode(Storage::get($path.'/inbox/'.$mail_id.'.json'), true);

		$i_status = $this->readStatus($flag, $user_id, 'inbox', $path);
		$_path = $path.'/'.$i_status.'_i.json';
		if(!Storage::exists($_path))
			Storage::put($_path, '[]');

		$_data = json_decode(Storage::get($_path), true);
		
		// If index has overflow
		if(count($_data) >= $this->max_Index){
			$i_status ++ ;
			$_data = null; 
			$_path = $path.'/'.$i_status.'_i.json';
			Storage::put($_path, '[]');
			$this->setStatus($flag, $user_id, 'inbox', '+1' ,$path);
			$_data = [];
		}
		
		$_data[] = $data;
		Storage::put($_path, json_encode(array_values($_data), JSON_PRETTY_PRINT));
		Storage::delete($path.'/inbox/'.$mail_id.'.json');
	}

}