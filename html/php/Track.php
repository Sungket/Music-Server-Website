<?php

class Track {
    private trackTitle;
    private length;
    private picture;
    private genre;

    public function __construct()
    {
        
    }

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