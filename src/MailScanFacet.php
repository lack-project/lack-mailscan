<?php

namespace Lack\MailScan;

use Lack\MailScan\Config\ImapDriver;

class MailScanFacet
{


    public function __construct(public readonly ImapDriver $imapDriver) {

    }


    public function syncMailbox (MailStorageInterface $mailStorage) {
        $messageIds = $this->imapDriver->mailbox->searchMailbox("ALL");
        

        foreach ($messageIds as $messageId) {
            $mailHeader = $this->imapDriver->mailbox->getMailHeader($messageId);
            echo "\nChecking: " . $mailHeader->subject  . "(From: {$mailHeader->fromAddress} To: {$mailHeader->toString})...";
            if ( ! $mailStorage->needsSync($mailHeader))
                continue; // Skip already synced or not needed mails

            echo "Syncing...";
            $mailStorage->syncSingleMail($this->imapDriver->mailbox->getMail($messageId));
        }

    }

}
