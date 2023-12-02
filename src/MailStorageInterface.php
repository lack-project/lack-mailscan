<?php

namespace Lack\MailScan;

use PhpImap\IncomingMail;
use PhpImap\IncomingMailHeader;

interface MailStorageInterface
{

    /**
     * if it returns true, the full mail will be synced with syncSingleMail()
     *
     * @param IncomingMailHeader $mailHeader
     * @return bool
     */
    public function needsSync (IncomingMailHeader $mailHeader) : bool;

    /**
     * Only called for E-Mails that needsSync() returned true
     *
     * @param IncomingMail $mail
     * @return void
     */
    public function syncSingleMail (IncomingMail $mail) : void;

}
