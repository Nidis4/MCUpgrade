<?php

  function mcencode($input){

  	 return base64_encode(convert_uuencode($input));
  }

  function mcdecode($input){
  	return convert_uudecode(base64_decode($input));
  }

	/**
	 * @param $data
	 * @param $key
	 * @return string
	 */
	 function simpleEncrypt($data, $key)
	{
		return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key),
			$data, MCRYPT_MODE_CBC, md5(md5($key))));
	}

	/**
	 * @param $data
	 * @param $key
	 * @return string
	 */
	function simpleDecrypt($data, $key)
	{
		return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key),
			base64_decode($data), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
	}

?>