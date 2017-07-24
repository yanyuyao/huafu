<?php
defined('SYSTEM_IN') or exit('Access Denied');
define('subscribe_key', '系统_关注事件');
define('default_key', '系统_默认回复');
$_QMXK=array();
class weixinAddons  extends BjSystemModule {
	public function do_getopenid()
	{
		$weixinopenid=get_session_account(false);
		
	}
	
	public function do_process()
	{
		global $_GP;
		$settings=globaSetting();
	$configdata = $settings['weixintoken'];
	$token=$configdata;
    if(!$this->checkSign($token))
      	{
     	exit('Access Denied');
      	}
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'get') {
			
			ob_clean();
			ob_start();
			exit($_GET['echostr']);
		}
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
			$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		$message=$this->requestParse($postStr);
		if (empty($message)) {
				exit('Request Failed');
			}
			if($message['type']=='text'||$message['type']=='CLICK')
			{
				
				$key=$message['content'];
				
				if($message['type']=='CLICK')
				{
					
									$key=$message['eventkey'];
				}
				
				if(!empty($key))
				{
				$reply = mysqld_select('SELECT * FROM '.table('weixin_rule')."   WHERE  keywords = :keywords" , array(':keywords' =>$key));
				}
				
				
				
			}
				if($message['type']=='subscribe')
			{
					$reply = mysqld_select('SELECT * FROM '.table('weixin_rule')."   WHERE  keywords = :keywords" , array(':keywords' =>subscribe_key));
			}
			if(empty($reply['id']))
			{
					$reply = mysqld_select('SELECT * FROM '.table('weixin_rule')."   WHERE  keywords = :keywords" , array(':keywords' =>default_key));
			}
				if($reply['ruletype']==1)
				{
						$reply['content'] = htmlspecialchars_decode($reply['description']);
		$reply['content'] = str_replace(array('<br>', '&nbsp;'), array("\n", ' '), $reply['content']);
		$reply['content'] = strip_tags($reply['content'], '<a>');
		return $this->respText($reply['content'],$message);
					
				}
				if($reply['ruletype']==2)
				{
					
						$news = array();
			$news = array(
				'title' => $reply['title'],
				'description' => $reply['description'],
				'picurl' => $reply['thumb'],
				'url' =>  $reply['url'],
			);
			return $this->respNews($news,$message);
					
				}
				
				
				exit('');
		
		}
		
	}
	
	
		private function respText($content,$message) {
		$content = str_replace("\r\n", "\n", $content);
		$response = array();
		$response['FromUserName'] = $message['to'];
		$response['ToUserName'] = $message['from'];
		$response['MsgType'] = 'text';
		$response['Content'] = htmlspecialchars_decode($content);
		return $this->response($response);
	}
	
		private function respNews($row,$message) {
		if (empty($row)) {
			return exit( 'Invaild value');
		}
		$response = array();
		$response['FromUserName'] = $message['to'];
		$response['ToUserName'] = $message['from'];
		$response['MsgType'] = 'news';
		$response['ArticleCount'] = 1;
		$response['Articles'] = array();
			$response['Articles'][] = array(
				'Title' => $row['title'],
				'Description' => $row['description'],
				'PicUrl' => WEBSITE_ROOT.'attachment/'.$row['picurl'],
				'Url' => $row['url'],
				'TagName' => 'item',
			);
		return $this->response($response);
	}

	private function response($packet) {
	
		if (!is_array($packet)) {
			return $packet;
		}
		if(empty($packet['CreateTime'])) {
			$packet['CreateTime'] = time();
		}
		if(empty($packet['MsgType'])) {
			$packet['MsgType'] = 'text';
		}
		if(empty($packet['FuncFlag'])) {
			$packet['FuncFlag'] = 0;
		} else {
			$packet['FuncFlag'] = 1;
		}
		return $this->array2xml($packet);
	}
		private function array2xml($arr, $level = 1, $ptagname = '') {
		$s = $level == 1 ? "<xml>" : '';
		foreach($arr as $tagname => $value) {
			if (is_numeric($tagname)) {
				$tagname = $value['TagName'];
				unset($value['TagName']);
			}
			if(!is_array($value)) {
				$s .= "<{$tagname}>".(!is_numeric($value) ? '<![CDATA[' : '').$value.(!is_numeric($value) ? ']]>' : '')."</{$tagname}>";
			} else {
				$s .= "<{$tagname}>".self::array2xml($value, $level + 1)."</{$tagname}>";
			}
		}
		$s = preg_replace("/([\x01-\x08\x0b-\x0c\x0e-\x1f])+/", ' ', $s);
		return $level == 1 ? $s."</xml>" : $s;
	}
	private function requestParse($message) {
		$packet = array();
		if (!empty($message)){
			$obj = simplexml_load_string($message, 'SimpleXMLElement', LIBXML_NOCDATA);
			if($obj instanceof SimpleXMLElement) {
				$obj = json_decode(json_encode($obj),true);
				
				$packet['from'] = strval($obj['FromUserName']);
				$packet['to'] = strval($obj['ToUserName']);
				$packet['time'] = strval($obj['CreateTime']);
				$packet['type'] = strval($obj['MsgType']);
				$packet['event'] = strval($obj['Event']);

				foreach ($obj as $variable => $property) {
					if (is_array($property)) {
						$property = array_change_key_case($property);
					}
					$packet[strtolower($variable)] = $property;
				}
				if($packet['type'] == 'event') {
					$packet['type'] = $packet['event'];
					unset($packet['content']);
				}
			}
		}
		return $packet;
	}
	private function checkSign($token) {
		global $_GP;
	 $signature = $_GET["signature"];
   $timestamp = $_GET["timestamp"];
   $nonce = $_GET["nonce"];
        		
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	

	
}


