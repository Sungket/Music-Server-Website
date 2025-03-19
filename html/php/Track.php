<?php

class Track {

    public function __construct(private string $trackTitle = "Track",
        private float $length = 0,
        private $picture = NULL,
        private ?string $genre = NULL,
        private ?string $path = NULL)
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

    public function getPath() : string {
        return $this->path;
    }

    public function setTitle($trackTitle) : void {
        if (isset($trackTitle)) {
            $pattern = "/^[a-z0-9 .\-]+$/i";
            if (preg_match($pattern, $trackTitle)) {

            }
        }
    }
}