<?php
// echo"where in admin";
require_once "../app/views/inc/header.php"
?>


<!-- <h1>welcome</h1> -->
<div class="overflow-x-auto w-4/5 float-right flex-col items-center justify-center h-screen p-10">
    <div class="button py-4">
        <button class="btn" onclick="my_modal_1.showModal()">
            <i class="fa-solid fa-plus"> </i>
            Ajouter un Claim
        </button>
    </div>

    <!-- _______________add_form____________ -->
    <div class="popform">
        <dialog id="my_modal_2" class="modal w-2/5 ml-104 rounded-2xl bg-gray-200 text-center py-12">
            <div class="modal-box">
                <h1 class="text-3xl font-bold mb-12">Editer un Claim</h1>
                <form class="flex  flex-col justify-center items-center gap-4" action="" method="post">
                    <label for="">Description de claim</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="descr" />
                    <label for="">Date</label>
                    <input type="date" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="date" />
                    <label for="">Montant De Prim</label>
                    <input type="number" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="montprim" />
                    <label for="">Date Prim</label>
                    <input type="date" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="dateprim" />

                    <label for="">Article</label>
                    <select name="article" class="input input-bordered w-full max-w-xs">
                        <option value="">Select Your Article</option>
                        <?php  foreach($data["article"] as $assuren){
                                    echo " 
                                       <option value = '$assuren->ID_Article'>$assuren->Titre</option>
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
    $claims=$data['claims'];
    ?>
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th><i class="fa-solid fa-shield-halved"></i> ID_Claim</th>
                <th><i class="fa-solid fa-user-secret"></i> Description</th>
                <th><i class="fa-solid fa-user-secret"></i> Date</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> MontantPrim</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> DatePrim</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> Article</th>
                <th><i class="fa-solid fa-gears"></i> Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($claims as $cli) {
            ?>
            <tr>
                <th><?= $cli->ID_Claim ?></th>
                <td><?= $cli->Description ?></td>
                <td><?= $cli->Date ?></td>
                <td><?= $cli->MontantPrim ?></td>
                <td><?= $cli->DatePrim ?></td>
                <td><?= $cli->Titre ?></td>
                <td><a href="deleteClaim/<?= $cli->ID_Claim ?>" class="p-2"><i class="fa-solid fa-trash"></i></a>
                    <button>
                        <a href="editClaim/<?= $cli->ID_Claim ?>"> <i class="fa-solid fa-pen-to-square"></i></a>
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