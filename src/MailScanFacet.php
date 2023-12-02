<?php

namespace Lack\MailScan;

use Lack\MailScan\Config\ImapDriver;

class MailScanFacet
{


    public function __construct(public readonly ImapDriver $imapDriver) {

    }


    public function syncMailbox (MailStorageInterface $mailStorage, string $mailboxName = null) {


        if ($mailboxName === null)
            $mailboxName = $this->imapDriver->mailboxConfig->inboxFolder;

        $this->imapDriver->mailbox->getMailboxes(); // Refresh mailboxes (needed for switching
        $this->imapDriver->mailbox->switchMailbox($mailboxName);

        $messageIds = $this->imapDriver->mailbox->searchMailbox("ALL");
        foreach ($messageIds as $messageId) {
            $mailHeader = $this->imapDriver->mailbox->getMailHeader($messageId);
            echo "\nChecking: " . $mailHeader->subject  . "(From: {$mailHeader->fromAddress} To: {$mailHeader->toString})...";
            if ( ! $mailStorage->needsSync($mailHeader)) {
                echo "Skipped";
                continue; // Skip already synced or not needed mails
            }
                
            echo "\nSyncing...";
            $mailStorage->syncSingleMail($this->imapDriver->mailbox->getMail($messageId));
        }

    }

}
