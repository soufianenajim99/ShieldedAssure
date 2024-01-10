<?php
// echo"where in admin";
require_once "../app/views/inc/header.php"
?>


<h1>welcome mwere in update</h1>
<div class="overflow-x-auto w-4/5 float-right flex-col items-center justify-center h-screen p-10">
    <div class="button py-4">
        <button class="btn" onclick="my_modal_1.showModal()">
            <i class="fa-solid fa-plus"> </i>
            Ajouter un client
        </button>
    </div>

    <!-- _______________add_form____________ -->
    <div class="popform">
        <dialog id="my_modal_2" class="modal w-2/5 ml-104 rounded-2xl bg-gray-200 text-center py-12">
            <div class="modal-box">
                <h1 class="text-3xl font-bold mb-12">Editer un client</h1>
                <form class="flex  flex-col justify-center items-center gap-4" action="" method="post">
                    <label for="">Nom De client</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Nom" />
                    <label for="">Prenom</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Prenom" />
                    <label for="">Adresse De client</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Adresse" />
                    <label for="">Username</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="username" />
                    <label for="">Password</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Password" />

                    <label for="">Assurence</label>
                    <select name="assurence" class="input input-bordered w-full max-w-xs">
                        <option value="">Select Your assurence</option>
                        <?php  foreach($data["assurs"] as $assuren){
                                    echo " 
                                       <option value = '$assuren->ID_Assureur'>$assuren->Nom</option>
                                    ";
                                } ?>
                    </select>

                    <button class="btn btn-wide" type="submit">Submit</button>
                </form>
            </div>
        </dialog>

    </div>

    <!-- _______________update_form____________ -->

    <!-- 
    <div class="popform">
        <dialog id="my_modal_2" class="modal w-2/5 ml-104 rounded-2xl bg-gray-200 text-center py-12">
            <div class="modal-box">
                <h1 class="text-3xl font-bold mb-12">Editer un client</h1>
                <form class="flex  flex-col justify-center items-center gap-4" action="editAssurence" method="post">
                    <label for="">Nouveau Nom D'client</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Nom" />
                    <label for="">Nouvelle Adresse D'client</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Adresse" />
                    <button class="btn btn-wide" type="submit">Submit</button>
                </form>
            </div>
        </dialog>

    </div> -->



    <?php
    $clients=$data['clients'];
    ?>
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th><i class="fa-solid fa-shield-halved"></i> ID_client</th>
                <th><i class="fa-solid fa-user-secret"></i> Nom</th>
                <th><i class="fa-solid fa-user-secret"></i> Prenom</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> Adresse</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> Username</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> Password</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> Assurence</th>
                <th><i class="fa-solid fa-gears"></i> Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($clients as $cli) {
            ?>
            <tr>
                <th><?= $cli->ID_Client ?></th>
                <td><?= $cli->Nom ?></td>
                <td><?= $cli->Prenom ?></td>
                <td><?= $cli->Adresse ?></td>
                <td><?= $cli->username ?></td>
                <td><?= $cli->password ?></td>
                <td><?= $cli->NomAssureur ?></td>
                <td><a href="deleteClient/<?= $cli->ID_Client ?>" class="p-2"><i class="fa-solid fa-trash"></i></a>
                    <button>
                        <a href="editClient/<?= $cli->ID_Client ?>"> <i class="fa-solid fa-pen-to-square"></i></a>

                    </button>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script>
window.onload = function() {
    var modal2 = document.getElementById('my_modal_2');
    modal2.showModal();
};
</script>
<?php
// echo"where in admin";
require_once "../app/views/inc/footer.php"
?>