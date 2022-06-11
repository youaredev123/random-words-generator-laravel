<?php
/**
 * Custom helper function to generate a random word  
 * Added by Denis 
 * @param array $option A option of alphabet, Numerical, or both
 */



function generateRandomWord($option){


    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; // Alphabet characters
    $numerical = "0123456789"; // Numerical

    $characters = ""; // Characters that will be used to generate random word
    if(sizeof($option) == 1 && $option[0] == "A"){ // If $option = ['A']
        $characters = $alphabet;
    }else if(sizeof($option) == 1 && $option[0] == "N"){ // If $option = ['N']
        $characters = $numerical;
    }else{
        $characters = $alphabet . $numerical; // If $option = ['A', 'N']
    }
    
    $charactersLength = strlen($characters); // Characters's length 
    $randomWord = ""; // Random word what we are going to generate
    $randomWordLength = rand(1, $charactersLength); // Random word's length
  
    // Extract and merge a random character from $characters up to randomw word's length($randomWordLength)
    for ($i = 0; $i < $randomWordLength; $i++) {
        $index = rand(0, $charactersLength - 1); // Index to extract a random character from $characters
        $randomWord .= $characters[$index]; // Extract a random character and merge
    }
    
    return $randomWord;
}




