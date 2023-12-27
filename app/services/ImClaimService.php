''<?php

interface ImClaimService {
 function displayClaim();
 function addClaim(Claim $claim);
 function updateClaim(Claim $claim);
 function deleteClaim($claimId);
}

?>