<?php

namespace Lack\test;

use Lack\MailScan\Config\ImapDriver;
use Lack\MailScan\Config\ImapMailboxConfig;
use Lack\MailScan\MailScanFacet;
use Lack\MailScan\MailStorageInterface;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailHeader;
use PhpImap\Mailbox;




class FetchMailTest extends \PHPUnit\Framework\TestCase
{


    public function testConnectServer() {
        echo "test";
        $config = ImapMailboxConfig::LoadFromKeystore(__DIR__ . "/../.keystore.yml");
        $driver = new ImapDriver();
        $driver->connect($config);

        print_r($driver->mailbox->getMailboxes());

        $fetcher = new MailScanFacet($driver);
        $fetcher->syncMailbox(new TestStorageInterface());



    }


}
class TestStorageInterface implements MailStorageInterface {


    public function needsSync(IncomingMailHeader $mailHeader): bool
    {
        return true;
    }

    public function syncSingleMail(IncomingMail $mail): void
    {
        echo $mail->subject . "\n";
    }
}
