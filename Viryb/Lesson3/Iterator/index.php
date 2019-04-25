<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require_once "Song.php";
require_once "SongsList.php";

$songList = new SongsList();

$song1 = new Song('Im the One','DJ Khaled');
$song2 = new Song('Unforgettable','French Montana');
$song3 = new Song('Thunder','Imagine Dragons');
$song4 = new Song('Castle On The Hill','Ed Sheeran');
$song5 = new Song('Radioactive','Imagine Dragons');

$songList->addSong($song1)
    ->addSong($song2)
    ->addSong($song3)
    ->addSong($song4)
    ->addSong($song5);
$songList->getArray();
$newArray = $songList->getArray();



foreach ($songList as $item){
    echo $item->getNameOfSongAndAuthor()."<br>";
}
