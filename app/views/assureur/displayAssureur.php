<?php
// echo"where in admin";
require_once "../app/views/inc/header.php"
?>


<!-- <h1>welcome</h1> -->
<div class="overflow-x-auto w-4/5 float-right flex-col items-center justify-center h-screen p-10">
    <div class="button py-4">
        <button class="btn" onclick="my_modal_1.showModal()">
            <i class="fa-solid fa-plus"> </i>
            Ajouter un Assureur
        </button>
    </div>

    <!-- _______________add_form____________ -->
    <div class="popform">
        <dialog id="my_modal_1" class="modal w-2/5 ml-104 rounded-2xl bg-gray-200 text-center py-12">
            <div class="modal-box">
                <h1 class="text-3xl font-bold mb-12">Ajouter un Assureur</h1>
                <form class="flex  flex-col justify-center items-center gap-4" action="addassurence" method="post">
                    <label for="">Nom D'Assureur</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Nom" />
                    <label for="">Adresse D'Assureur</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Adresse" />
                    <button class="btn btn-wide" type="submit">Submit</button>
                </form>
            </div>
        </dialog>

    </div>

    <!-- _______________update_form____________ -->


    <div class="popform">
        <dialog id="my_modal_2" class="modal w-2/5 ml-104 rounded-2xl bg-gray-200 text-center py-12">
            <div class="modal-box">
                <h1 class="text-3xl font-bold mb-12">Editer un Assureur</h1>
                <form class="flex  flex-col justify-center items-center gap-4" action="editAssurence" method="post">
                    <label for="">Nouveau Nom D'Assureur</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Nom" />
                    <label for="">Nouvelle Adresse D'Assureur</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Adresse" />
                    <button class="btn btn-wide" type="submit">Submit</button>
                </form>
            </div>
        </dialog>

    </div>



    <?php
    $assurs=$data['assurs'];
    ?>
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th><i class="fa-solid fa-shield-halved"></i> ID_Assureur</th>
                <th><i class="fa-solid fa-user-secret"></i> Nom_Assureur</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> Adresse</th>
                <th><i class="fa-solid fa-gears"></i> Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($assurs as $assur) {
            ?>
            <tr>
                <th><?= $assur->ID_Assureur ?></th>
                <td><?= $assur->Nom ?></td>
                <td><?= $assur->Adresse ?></td>
                <td><a href="" class="p-2"><i class="fa-solid fa-trash"></i></a>
                    <button onclick="my_modal_2.showModal()">
                        <a href="assureur/editAssurence/<?= $assur->ID_Assureur ?>"> <i
                                class="fa-solid fa-pen-to-square"></i></a>

                    </button>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
// echo"where in admin";
require_once "../app/views/inc/footer.php"
?>