<?php
namespace app\common\logic;

class SmsLogic
{

	private $config;

	public function __construct()
	{
		$this->config = tpCache('sms') ?: [];
	}

	public function sendSms($scene, $sender, $params, $unique_id = 0)
	{
		$smsTemp = M('sms_template')->where("send_scene", $scene)->find();
	}

	private function realSendSms($mobile, $smsSign, $smsParam, $templateCode)
	{
		$type = (int) $this->config['sms_platform'] ?: 0;
	}

	private function sendSmsByAlidayu($mobile, $smsSign, $smsParam, $templateCode)
	{
		date_default_timezone_set('Asia/Shanghai');
	}
	
	private function sendSmsByAliyun($mobile, $smsSign, $smsParam, $templateCode)
	{
		include_once './vendor/aliyun-php-sdk-core/Config.php';
	}
}



