<?php

class Card {
    private $_image;
    private $_sentCount;
    private $_rating;
    private $_tag;
    private $_ratingCount;

    public function __construct($image, $sentCount, $rating, $tag, $ratingCount) {
        $this->_image = $image;
        $this->_sentCount = $sentCount;
        $this->_rating = $rating;
        $this->_tag = $tag;
        $this->_ratingCount = $ratingCount;
    }

    public function getImage() {
        return $this->_image;
    }

    public function getSentCount() {
        return $this->_sentCount;
    }

    public function getRating() {
        return $this->_rating;
    }

    public function getTag() {
        return $this->_tag;
    }

    public function getRatingCount() {
        return $this->_ratingCount;
    }

    public function setImage($image) {
        $this->_image = $image;
    }

    public function setSentCount($sentCount) {
        $this->_sentCount = $sentCount;
    }

    public function setRating($rating) {
        $this->_rating = $rating;
    }

    public function setTag($tag) {
        $this->_tag = $tag;
    }

    public function setRatingCount($ratingCount) {
        $this->_ratingCount = $ratingCount;
    }

    public function increaseSentCount() {
        $this->_sentCount++;
    }

    public function calculateNewRating($grade) {
        $this->_ratingCount++;
        $this->_rating += $grade;
        $this->_rating /= $this->_ratingCount;
    }
}
?>