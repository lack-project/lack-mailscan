<?php

namespace Lack\MailScan\Config;


class ImapMailboxConfig
{

    public string $imap_host;
    public string $username;
    public string $password;


    public static function LoadFromKeystore($file) {
        $data = phore_yaml_decode_file($file);

        $obj = new self();

        if ( ! isset($data["mail"]))
            throw new \InvalidArgumentException("Missing 'mail' section in config file '$file'");

        $obj->imap_host = $data["mail"]["imap_host"];
        $obj->username = $data["mail"]["username"];
        $obj->password = $data["mail"]["password"];
        return $obj;
    }

}
