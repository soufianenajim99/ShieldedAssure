''<?php

interface ImClaimService {
 function displayClaim();
 function addClaim(Claim $claim);
 function updateClaim(Claim $claim,$id);
 function deleteClaim($claimId);
}

?>