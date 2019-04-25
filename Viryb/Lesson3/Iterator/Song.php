<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "SongInterface.php";

class Song implements SongInterface
{
    /**
     * @var string
     */
    private $nameOfSong;

    /**
     * @var string
     */
    private $nameAuthor;

    /**
     * Song constructor.
     * @param $nameOfSong
     * @param $nameOfAuthor
     */
    public function __construct($nameOfSong, $nameOfAuthor)
    {
        $this->nameOfSong = $nameOfSong;
        $this->nameAuthor = $nameOfAuthor;
    }

    /**
     * Get name of song
     *
     * @return string
     */
    public function getNameOfSong()
    {
        return $this->nameOfSong;
    }

    /**
     * Get author name
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->nameAuthor;
    }

    /**
     * Get name of song and author
     *
     * @return string
     */
    public function getNameOfSongAndAuthor()
    {
        return "{$this->nameOfSong} by {$this->nameAuthor}";
    }
}
