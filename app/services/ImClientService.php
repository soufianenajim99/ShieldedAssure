''<?php

interface ImClientService {
 function displayClient();
 function addClient(Client $client);
 function updateClient(Client $client, $id);
 function deleteClient($clientId);
}

?>