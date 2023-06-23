<?php

class PersonalisedCard extends Card {
    private $_recipientName;
    private $_recipientMail;
    private $_description;

    public function __construct($image, $sentCount, $rating, $tag, $ratingCount, $recipientName, $recipientMail, $description) {
        parent::__construct($image, $sentCount, $rating, $tag, $ratingCount);
        $this->_recipientName = $recipientName;
        $this->_recipientMail = $recipientMail;
        $this->_description = $description;
    }


    public function getRecipientName() {
        return $this->_recipientName;
    }

    public function getRecipientMail() {
        return $this->_recipientMail;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function setRecipientName($recipientName) {
        $this->_recipientName = $recipientName;
    }

    public function setRecipientMail($recipientMail) {
        $this->_recipientMail = $recipientMail;
    }

    public function setDescription($description) {
        $this->_description = $description;
    }
}
?>