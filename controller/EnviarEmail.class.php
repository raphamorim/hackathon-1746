<?php

class EnviarEmail {
    
    private $from;
    private $to;
    private $subject;
    private $message;
    private $header;
    private $emailfantasy = "site@xgoservice.com.br";

    public function __construct ($from = '', $to = '', $subject = '', $message = '')
    {
        if (! empty($from) && ! empty($to) && ! empty($subject) &&
         ! empty($message))
        {
            if ($this->emailValidate($from, $to))
            {
                $this->from    = $from;
                $this->to      = $to;
                $this->subject = $subject;
                $this->message = $message;
                
                $this->header  = 
                "MIME-Version: 1.0". "\n" . 
                "Content-type: text/html; charset=utf-8" . "\n" .
                "From: " . $this->from . "\n" .
                "Return-Path: " . $this->emailfantasy . "\n" .
                "Reply-To: " . $this->from . "\n" . 'X-Mailer: PHP/' .
                phpversion();

            }
            else
            {
                exit('Digite os endereços de email corretamente.');
            }
        }
    }
    /**
     * 
     * Envia o email para o destinatário: 'to'
     * Caso o email tenha sido enviado, retorna true
     * Caso tenha ocorrido alguma falha durante o envio, retorna false
     */
    public function send ()
    {
        if (mail($this->to, $this->subject, $this->message, $this->header, "-r" . $this->emailfantasy))
        {
            return TRUE;
        } else
        {
            return FALSE;
        }
    }
    /**
     * 
     * Valida os emails passados como parâmetro no construtor
     * 
     * @param string $from
     * @param string $to
     */
    public function emailValidate ($from, $to)
    {
        if (filter_var($from, FILTER_VALIDATE_EMAIL) &&
         filter_var($to, FILTER_VALIDATE_EMAIL))
        {
            return TRUE;
        } else
        {
            return FALSE;
        }
    }
    /**
     * @return the $from
     */
    public function getFrom ()
    {
        return $this->from;
    }
    /**
     * @return the $to
     */
    public function getTo ()
    {
        return $this->to;
    }
    /**
     * @return the $subject
     */
    public function getSubject ()
    {
        return $this->subject;
    }
    /**
     * @return the $message
     */
    public function getMessage ()
    {
        return $this->message;
    }
    /**
     * @param string $from
     */
    public function setFrom ($from)
    {
        $this->from = $from;
    }
    /**
     * @param string $to
     */
    public function setTo ($to)
    {
        $this->to = $to;
    }
    /**
     * @param string $subject
     */
    public function setSubject ($subject)
    {
        $this->subject = $subject;
    }
    /**
     * @param string $message
     */
    public function setMessage ($message)
    {
        $this->message = $message;
    }
	
}
?>
