<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */


class SongsList implements \Iterator
{
    /**
     * @var $songs
     */
    private $songs = [];

    /**
     * @var null
     */
    private $currentSong = null;

    /**
     * Add song to $songs array
     *
     * @param SongInterface $song
     *
     * @return $this
     */
    public function addSong(SongInterface $song)
    {
        $this->songs[spl_object_hash($song)] = $song;

        return $this;
    }

    /**
     * Remove song from $songs array
     *
     * @param SongInterface $song
     */
    public function removeSong(SongInterface $song)
    {
        if(isset($this->songs[spl_object_hash($song)])){
            unset($this->songs[spl_object_hash($song)]);
        }
    }

    /**
     * Count number of songs
     *
     * @return int
     */
    public function count()
    {
        return count($this->songs);
    }

    /**
     * Get current song
     *
     * @return Song
     */
    public function current()
    {
        return $this->songs[$this->currentSong];
    }

    /**
     * Switch to next song
     */
    public function next()
    {
       $this->currentSong++;
    }

    /**
     * @return number current song
     */
    public function key()
    {
        return $this->currentSong;
    }

    /**
     * Rewind
     */
    public function rewind()
    {
        $this->currentSong = 0;
    }

    public function valid()
    {
        return isset($this->songs[$this->currentSong]);
    }

    public function getArray()
    {
        return $this->songs;
    }
}
