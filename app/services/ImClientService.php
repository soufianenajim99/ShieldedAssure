''<?php

interface ImClientService {
 function displayClient();
 function addClient(Client $client);
 function updateClient(Client $client);
 function deleteClient($clientId);
}

?>