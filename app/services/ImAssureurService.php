''<?php

interface ImAssureurService {
 function displayAssureur();
 function addAssureur(Assureur $assureur);
 function updateAssureur(Assureur $assureur,$id);
 function deleteAssureur($assureurId);
}

?>