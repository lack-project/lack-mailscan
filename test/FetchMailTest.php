<?php

namespace Lack\test;

use Lack\MailScan\Config\ImapDriver;
use Lack\MailScan\Config\ServerConfig;
use PhpImap\Mailbox;

class FetchMailTest extends \PHPUnit\Framework\TestCase
{


    public function testConnectServer() {

        $config = ServerConfig::LoadFromKeystore(__DIR__ . "/../.keystore.yml");
        $driver = new ImapDriver();
        $driver->connect($config);

        $messageIds = $driver->mailbox->searchMailbox("ALL");

        phore_out($messageIds);

        foreach ($messageIds as $messageId) {
            $mail = $driver->mailbox->getMailHeader($messageId);
            print_r($mail->id, $mail->);
        }


    }


}
