<?php
class Encryption
{
    private $password = "sssU9989@";
    public function encrypt($data)
    {
        $encrypted_string = openssl_encrypt($data, "AES-128-ECB", $this->password);
        return $encrypted_string;
    }

    public function decrypt($encrypted_string)
    {
        $decrypted_string = openssl_decrypt($encrypted_string, "AES-128-ECB", $this->password);
        return $decrypted_string;
    }
}
