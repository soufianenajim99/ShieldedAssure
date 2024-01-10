<?php
// echo"where in admin";
require_once "../app/views/inc/header.php"
?>


<!-- <h1>welcome</h1> -->
<div class="overflow-x-auto w-4/5 float-right flex-col items-center justify-center h-screen p-10">
    <div class="button py-4">
        <button class="btn">
            <i class="fa-solid fa-plus"> </i>
            Ajouter un Article
        </button>
    </div>

    <!-- _______________add_form____________ -->
    <div class="popform">
        <dialog id="my_modal_1" class="modal w-2/5 ml-104 rounded-2xl bg-gray-200 text-center py-12">
            <div class="modal-box">
                <h1 class="text-3xl font-bold mb-12">Ajouter un Article</h1>
                <form class="flex  flex-col justify-center items-center gap-4" action="addArticle" method="post">
                    <label for="">Titre D'Article</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Nom" />



                    <label for="">Contenu D'Article</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Contenu" />

                    <label for="">Date</label>
                    <input type="date" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Date" />


                    <label for="">Assurence</label>
                    <select name="assurence" class="input input-bordered w-full max-w-xs">
                        <option value="">Select Your assurence</option>
                        <?php  foreach($data["assureurs"] as $assuren){
                                    echo " 
                                       <option value = '$assuren->ID_Assureur'>$assuren->Nom</option>
                                    ";
                                } ?>
                    </select>


                    <label for="">Client</label>
                    <select name="client" class="input input-bordered w-full max-w-xs">
                        <option value="">Select Your Client</option>
                        <?php  foreach($data["clients"] as $assuren){
                                    echo " 
                                       <option value = '$assuren->ID_Client'>$assuren->username</option>
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
                <h1 class="text-3xl font-bold mb-12">Editer un Article</h1>
                <form class="flex  flex-col justify-center items-center gap-4" actiClient" method="post">
                    <label for="">Nouveau Nom D'Article</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Nom" />
                    <label for="">Nouvelle Adresse D'Article</label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                        name="Adresse" />
                    <button class="btn btn-wide" type="submit">Submit</button>
                </form>
            </div>
        </dialog>

    </div> -->



    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th><i class="fa-solid fa-shield-halved"></i> ID_Article</th>
                <th><i class="fa-solid fa-user-secret"></i> Titre</th>
                <th><i class="fa-solid fa-user-secret"></i> Contenu</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> Date</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> Assureur</th>
                <th><i class="fa-solid fa-circle-exclamation"></i> Client</th>
                <th><i class="fa-solid fa-gears"></i> Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data["articles"] as $arti) {
            ?>
            <tr>
                <th><?= $arti->ID_Article ?></th>
                <td><?= $arti->Titre ?></td>
                <td><?= $arti->Contenu ?></td>
                <td><?= $arti->Date ?></td>
                <td><?= $arti->ID_Assureur ?></td>
                <td><?= $arti->ID_Client ?></td>
                <td><a href="deleteArticle/<?= $arti->ID_Article ?>" class="p-2"><i class="fa-solid fa-trash"></i></a>
                    <button>
                        <a href="editArticle/<?= $arti->ID_Article ?>"> <i class="fa-solid fa-pen-to-square"></i></a>

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
    var modal2 = document.getElementById('my_modal_1');
    modal2.showModal();
};
</script>
<?php
// echo"where in admin";
require_once "../app/views/inc/footer.php"
?>