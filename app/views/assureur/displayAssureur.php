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


    <div class="popform">
        <dialog id="my_modal_1" class="modal w-2/5 ml-104 rounded-2xl bg-gray-200 text-center py-12">
            <div class="modal-box">
                <h1 class="text-3xl font-bold mb-12">Ajouter un Assureur</h1>
                <form class="flex  flex-col justify-center items-center gap-4" action="" method="post">
                    <label for="">Nom D'Assureur</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                    <label for="">Adresse D'Assureur</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
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