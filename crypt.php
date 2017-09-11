<meta charset = UTF-8>
<?php
	function aes_encrypt($plaintext, $password)
	{   
    		$password = hash('sha256', $password, true);
    		$plaintext = gzcompress($plaintext);
 
   		$iv_source = defined('MCRYPT_DEV_URANDOM') ? MCRYPT_DEV_URANDOM : MCRYPT_RAND;
    		$iv = mcrypt_create_iv(32, $iv_source);
    
    		$ciphertext = mcrypt_encrypt('rijndael-256', $password, $plaintext, 'cbc', $iv);
    		$hmac = hash_hmac('sha256', $ciphertext, $password, true);
    
    		return base64_encode($ciphertext . $iv . $hmac);
	}

	function aes_decrypt($ciphertext, $password)
	{
    		$ciphertext = @base64_decode($ciphertext, true);
    		if ($ciphertext === false) 
			return false;
    		$len = strlen($ciphertext);
    		if ($len < 64) 
			return false;

    		$iv = substr($ciphertext, $len - 64, 32);
    		$hmac = substr($ciphertext, $len - 32, 32);
    		$ciphertext = substr($ciphertext, 0, $len - 64);
    
    		$password = hash('sha256', $password, true);    
    		$hmac_check = hash_hmac('sha256', $ciphertext, $password, true);
    		if ($hmac !== $hmac_check) 
			return false;
    
    		$plaintext = @mcrypt_decrypt('rijndael-256', $password, $ciphertext, 'cbc', $iv);
    		if ($plaintext === false) 
			return false;
    
    		$plaintext = @gzuncompress($plaintext);
    		if ($plaintext === false) 
			return false;
    
    		return $plaintext;
	}
?>
