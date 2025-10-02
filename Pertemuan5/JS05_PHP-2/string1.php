<?php
$loremIpsum = "Lorem, ipsum dolor sit amet consectetur adipisicing elit.
 Modi corrupti nisi dolore commodi repellat expedita, accusamus,
 reiciendis natus libero mollitia totam minima? Nobis eligendi commodi adipisci 
 repellat aut facere debitis.";
echo "<p>{$loremIpsum}</p>";
echo "Panjang karakter: ". strlen($loremIpsum) . "<br>";
echo "Panjang kata: ". str_word_count($loremIpsum) ."<br>";
echo "<p>" . strtoupper($loremIpsum) ."</p>";
echo "<p>" . strtolower($loremIpsum) ."</p>";
?>