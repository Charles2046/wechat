<?php
namespace think;

class Verify
{

	protected $config = array(
	);

	private $_image = NULL;

	private $_color = NULL;

	public function __construct($config = array())
	{
		$this->config = array_merge($this->config, $config);
	}

	public function __get($name)
	{
		return $this->config[$name];
	}

	public function __set($name, $value)
	{
		if (isset($this->config[$name])) {
			$this->config[$name] = $value;
		}
	}

	public function __isset($name)
	{
		return isset($this->config[$name]);
	}

	public function check($code, $id = '')
	{}

	public function entry($id = '')
	{}

	private function _writeCurve()
	{}

	private function _writeNoise()
	{}

	private function _background()
	{}

	private function authcode($str)
	{}
}