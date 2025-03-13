<?php

class Track {

    public function __construct(private string $trackTitle = "Track",
        private float $length = 0,
        private $picture = NULL,
        private ?string $genre = NULL)
    {}

    public function getTitle() : string {
        return $this->trackTitle;
    }

    public function getLength() : float {
        return $this->length;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function getGenre() : string {
        return $this->genre;
    }

    
}