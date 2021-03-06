<?php
if (!defined('BASE_PATH')) exit('Access Denied!');
/**
 * 加密解密算法
 */
class Util_Encrypt {
	private $_key; //密匙
	private $_iv;
	
	function __construct($key, $iv = 0) {
		$this->setInit($key, $iv);
	}
	/**
	 * 设置密钥
	 * @param string $key
	 * @param int $iv
	 */
	public function setInit($key, $iv = 0) {
		if ($key)
			$this->_key = $key;
		if ($iv == 0) {
			$this->_iv = $key;
		} else {
			$this->_iv = $iv;
		}
	}
	/**
	 * des 加密
	 * @param string $str
	 * @return string
	 */
	public function desEncrypt($str) {
		$size = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_CBC);
		$str = $this->_desPkcs5Pad($str, $size);
		
		@ $data = mcrypt_cbc(MCRYPT_DES, $this->_key, $str, MCRYPT_ENCRYPT, $this->_iv);
		return base64_encode($data);
	}
	/**
	 * des 解密
	 * @param string $str
	 * @return string
	 */
	public function desDecrypt($str) {
		$str = base64_decode($str);
		@ $str = mcrypt_cbc(MCRYPT_DES, $this->_key, $str, MCRYPT_DECRYPT, $this->_iv);
		$str = $this->_desPkcs5Unpad($str);
		return $str;
	}
	
	private function _desPkcs5Pad($text, $blocksize) {
		$pad = $blocksize - (strlen($text) % $blocksize);
		return $text . str_repeat(chr($pad), $pad);
	}
	
	private function _desPkcs5Unpad($text) {
		$pad = ord($text{strlen($text) - 1});
		if ($pad > strlen($text))
			return false;
		if (strspn($text, chr($pad), strlen($text) - $pad) != $pad)
			return false;
		return substr($text, 0, - 1 * $pad);
	}
}