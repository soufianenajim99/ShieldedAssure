''<?php

interface ImAssureurService {
 function displayAssureur();
 function addAssureur(Assureur $assureur);
 function updateAssureur(Assureur $assureur);
 function deleteAssureur($assureurId);
}

?>