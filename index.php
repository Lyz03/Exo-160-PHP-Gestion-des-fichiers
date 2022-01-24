<?php

/**
 * 1. Créez une variable contenant une chaîne de caractères contenant du texte lorem ( 1 seule ligne suffit )
 * 2. Ajouter le contenu de cette variable dans un fichier avec la méthode de votre choix.
 * --> Attention à bien fermer votre fichier si vous utilisez fopen()
 */
// TODO Votre code ici.
$lorem = "Lorem ipsum dolor sit amet, consectetur adipisicing elit.";
file_put_contents('lorem.txt', $lorem);

/**
 * 3. Créez un tableau contenant au moins 10 chaînes de caractère au choix.
 * 4. Faites en sorte d'ajouter chaque chaîne de caractère de ce tableau au fichier créé dans la première partie ( point 2 )
 * --> N'oubliez pas de fermer vos fichiers.
 * --> Attention: les chaînes de caractères doivent s'ajouter à la suite du contenu déjà existant, pas d'écrasement.
 */
// TODO Votre code ici
$array = [
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7',
    '8',
    '9',
    '10',
];

$file = fopen('lorem.txt', "a+b");
foreach ($array as $value) {
    fwrite($file, $value);
}

fclose($file);

echo file_get_contents('lorem.txt') . "<br>";
/**
 * 5. Trouvez une solution pour afficher à l'aide d'un simple echo l'extension du fichier index.php
 */
// TODO Votre code ici
$extension = pathinfo('index.php');
echo $extension["extension"] . "<br>";


/**
 * 6. Testez si le fichier 'toto' existe, sil n'existe pas, afficher un texte distant que ce fichier n'existe pas !
 */
// TODO Votre code ici.
if (!file_exists('toto.txt')) {
    echo "le fichier n'existe pas <br>";
}

/**
 * Super bonus.
 * Parcourrez votre fichier, à chaque fois que vous rencontrez le caractère 'a', remplacez le par le caractère '@'
 * Attention, il y a un piège avec les pointeurs et une manière très simple de procéder... réfléchissez...
 */
// TODO Votre code ici si vous faites le bonus.

$len = strlen(file_get_contents('lorem.txt'));

// read the file and put in newLoremContent the new content (change a to @)
$file = fopen('lorem.txt', "r+b");
$newLoremContent = '';
for ($i = 0; $i < $len; $i++) {
    $char = fgetc($file);
    if ($char === 'a') {
        $newLoremContent .= '@';
    } else {
        $newLoremContent .= $char;
    }
}
fclose($file);

// write in the file the new content
$file = fopen('lorem.txt', "w+b");

fwrite($file, $newLoremContent);
echo file_get_contents('lorem.txt');
fclose($file);