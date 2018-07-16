<?php
    ini_set ("display_errors", "1");

    error_reporting(E_ALL);

    function checkEmailForSpam($email, $password, $pop3Server = "imap.beget.com") {
        $inbox = imap_open('{'.$pop3Server.':993/ssl}INBOX', $email, $password);
        if (!$inbox){
            return false;
        }
        
        /*$status = imap_status($inbox, '{'.$pop3Server.':993/imap/ssl}INBOX', SA_ALL);
        if ($status) {
          echo "Messages:   " . $status->messages    . "<br />\n";
          echo "Recent:     " . $status->recent      . "<br />\n";
          echo "Unseen:     " . $status->unseen      . "<br />\n";
          echo "UIDnext:    " . $status->uidnext     . "<br />\n";
          echo "UIDvalidity:" . $status->uidvalidity . "<br />\n";
        } else {
          echo "imap_status failed: " . imap_last_error() . "\n";
        }*/
        
        $result = true;
        $emails = imap_search($inbox,"UNSEEN");
        //$emails = imap_search($inbox,"ALL");
        
        
        $blockedEmails = array();
        $seen = array();
        
        if (!$emails) {
            $emails = array();
        }
        foreach($emails as $mail) {
            $message = @imap_fetchbody($inbox, $mail, 1.2);

            if (imap_base64($message))
                $message = imap_base64($message);
            else {
                $message = @imap_fetchbody($inbox, $mail, 1);
                if (imap_base64($message))
                    $message = imap_base64($message);
            }
            
            //echo $message . "<hr>";

            if (strpos($message, "SPAM") or strpos($message, "spam message rejected")) {
                preg_match("/\ ([^\ ]+@[^\ ]+)\ /m", $message, $matches);
                $blockedEmails[] = $matches[1];
                $result = false;
            }

            $seen[] = $mail;
        }
        $checked = implode(",", $seen);
        imap_setflag_full($inbox, $checked, "\\Seen \\FLAGGED");
        imap_close($inbox);
        return $blockedEmails;
    }
    
?>