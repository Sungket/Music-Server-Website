<?php

class Track {

    public function __construct(private string $trackTitle = "Track",
        private ?string $genre = NULL,
        private ?string $path = NULL,
        private ?string $imagePath = NULL)
    {}

    public function getTitle() : string {
        return $this->trackTitle;
    }

    public function getGenre() : string {
        return $this->genre;
    }

    public function getPath() : string {
        return $this->path;
    }

    public function getImagePath() : string {
        return $this->imagePath;
    }

    public function setTitle($trackTitle) : void {
        if (isset($trackTitle)) {
            $pattern = "/^[a-z0-9 .\-]+$/i";
            //ensure that the track title is only in allowed characters
            if (preg_match($pattern, $trackTitle)) {
                $this->trackTitle = $trackTitle;
            }
        }
    }
}