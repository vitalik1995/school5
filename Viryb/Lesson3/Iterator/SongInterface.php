<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

interface SongInterface
{
    /**
     * @return string
     */
    public function getNameOfSong();

    /**
     * @return string
     */
    public function getAuthor();

    /**
     * @return mixed
     */
    public function getNameOfSongAndAuthor();
}
