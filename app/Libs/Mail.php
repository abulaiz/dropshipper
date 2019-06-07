<?php namespace App\Libs;

use Illuminate\Support\Facades\Storage;
use Auth;
use App\Traits\MailManager;
use DateTime;

class Mail
{

	use MailManager;

	private static $instance;

	private $max_load = 20;

	public static function getInstance()
	{
		if ( is_null( self::$instance ) )
		{
		  self::$instance = new self();
		}
		return self::$instance;
	}	

	// index of $arr is ....
	// 'flag_sender', 'flag_receiper'
	// 'sender_id', 'receiper_id',
	// 'sender_name', 'receiper_name',
	// 'sender_mail', 'receiper_mail',
	// 'subject','text' ,'attachment'
	public function write($arr){
		// Generate ID
		$id = strtoupper( uniqid( Auth::user()->id ) );
		$date = date("Y-m-d H:i");

		// Save to Receipter Inbox
		$i_path = $this->getInboxPath($arr['flag_receiper'], $arr['receiper_id']);
		$arr_r = [
			'id' => $id,
			'subject' => $arr['subject'],
			'email' => $arr['sender_mail'],
			'flag' => $arr['flag_sender'],
			'text' => $arr['text'],
			'attachment' => (isset($arr['attachment']) ? $arr['attachment'] : []),
			'sender_name' => $arr['sender_name'],
			'sender_id' => (isset($arr['sender_id']) ? $arr['sender_id'] : null),
			'created_at' => $date
		]; 

		Storage::put($i_path.'/'.$id.'.json' , json_encode($arr_r , JSON_PRETTY_PRINT));

		// Save to Sender Outbox
		if( $arr['flag_sender'] != 'S'  ){
			$file_s = $this->getOutboxPath( $arr['flag_sender'], $arr['sender_id']);
			$arr_s = json_decode(Storage::get($file_s), true);
			$arr_s[] = [
				'id' => $id,
				'subject' => $arr['subject'],
				'email' => $arr['receiper_mail'],
				'flag' => $arr['flag_receiper'],
				'text' => $arr['text'],
				'attachment' => (isset($arr['attachment']) ? $arr['attachment'] : []),
				'receiper_name' => $arr['receiper_name'],
				'receiper_id' => (isset($arr['receiper_id']) ? $arr['receiper_id'] : null),
				'created_at' => $date
			]; 
			Storage::put($file_s , json_encode( array_values($arr_s) , JSON_PRETTY_PRINT));			
		}
	}

	// $last =  = ['file' => null, 'id' => null]
	public function readInbox($flag, $user_id, $last, $count = null){

		$count = $count == null ? $this->max_load : $count;
		$path = $this->getPath($flag, $user_id);
		$mails = [];
		$skip = $last['id'] != null;
		$last['file'] = $last['file'] == null ? 'inbox' : $last['file'];

		if($last['file'] == 'inbox'){
			$i_path = $path.'/inbox';
			$i_files = Storage::files($i_path);
			$length = count($i_files);
			for($i = $length - 1; $i>= 0; $i--){
				$data = json_decode(Storage::get($i_files[$i]), true);

				if($last['id'] == $data['id'] ) $skip == false;
				if($skip) continue;
				$mails[] = $this->setContent($data, 'inbox');
				$count -- ;
				if ($count == 0)
					return ['data' => $mails, 'next' => true];
			}
		}

		$num = ($last['file'] == 'inbox' ? $this->readStatus($flag, $user_id, 'inbox', $path) : (int) substr($last['file'] , 0, 1) );

		if(!Storage::exists($path.'/'.$num.'_i.json'))
			return ['data' => $mails, 'next' => false];

		for($j = $num ; $j>0; $j--){
			$data = json_decode(Storage::get($path.'/'.$j.'_i.json'), true);
			$length = count($data);
			for($i = $length - 1; $i>= 0; $i--){
				if($last['id'] == $data[$i]['id'] ) $skip == false;
				if($skip) continue;
				$mails[] = $this->setContent($data[$i], $j.'_i');
				$count -- ;
				if ($count == 0)
					return ['data' => $mails, 'next' => true];
			}			
		}

		return ['data' => $mails, 'next' => false];
	}

	public function readOutbox($flag, $user_id, $last, $count = null){
		$count = $count == null ? $this->max_load : $count;
		$path = $this->getPath($flag, $user_id);
		$mails = [];
		$skip = $last['id'] != null;

		$num = ($last['file'] == null ? $this->readStatus($flag, $user_id, 'outbox', $path) : (int) substr($file , 0, 1) );

		if(!Storage::exists($path.'/'.$num.'_o.json'))
			return ['data' => $mails, 'next' => false];

		for($j = $num ; $j>0; $j--){
			$data = json_decode(Storage::get($path.'/'.$j.'_o.json'), true);
			$length = count($data);
			for($i = $length - 1; $i>= 0; $i--){
				if($last['id'] == $data[$i]['id'] ) $skip == false;
				if($skip) continue;
				$mails[] = $this->setContent($data[$i], $j.'_o');
				$count -- ;
				if ($count == 0)
					return ['data' => $mails, 'next' => true];
			}			
		}

		return ['data' => $mails, 'next' => false];		
	}

	public function detailMail($flag, $user_id, $mail_id, $file){
		$path = $this->getPath($flag, $user_id);
		if($file == 'inbox'){
		  $data = json_decode( Storage::get($path . '/inbox/' . $mail_id . '.json'), true );
		  return $data;
		} else {
			$data = json_decode( Storage::get($path . '/' . $file . '.json'), true );
			$res = null;
			foreach ($data as $item) {
				if($item['id'] == $mail_id){
					$res = $item;
				}
			}
			return $res;
		}
	}

	public function countUnreadMessage($flag, $user_id){
		$path = $this->getInboxPath($flag, $user_id);
		$data = Storage::files($path);
		return count($data);
	}
}