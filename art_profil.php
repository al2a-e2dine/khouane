<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_GET['type']) and isset($_GET['id'])) {
  $get_id=$_GET['id'];
  if ($_GET['type']==1) {
    $q="SELECT * FROM `glasses` WHERE id='$get_id'";
  }elseif ($_GET['type']==2) {
    $q="SELECT * FROM `glass` WHERE id='$get_id'";
  }elseif ($_GET['type']==3) {
    $q="SELECT * FROM `lenses` WHERE id='$get_id'";
  }elseif ($_GET['type']==4) {
    $q="SELECT * FROM `implants` WHERE id='$get_id'";
  }elseif ($_GET['type']==5) {
    $q="SELECT * FROM `produit_entre` WHERE id='$get_id'";
  }elseif ($_GET['type']==6) {
    $q="SELECT * FROM `other` WHERE id='$get_id'";
  }
  
    $r=mysqli_query($dbc,$q);
    $num=mysqli_num_rows($r);

    if ($num!=1) {
      header('location:index.php');
    } 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Article</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
    include 'sidebar.html';
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
        include 'topbar.html';
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php
          $row=mysqli_fetch_assoc($r);
          ?>
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-6">
                          <?php
                          if ($_GET['type']==1) {
                          ?>
                            <h3>Lunette</h3>
                            <p><b>Code : </b>glasses_<?= $row['id'] ?></p>
                            <p><b>Référence : </b><?= $row['ref'] ?></p>
                            <p><b>Marque : </b><?= $row['marque'] ?></p>
                            <p><b>Sexe : </b><?= $row['sexe'] ?></p>
                            <p><b>Mineur ou majeur : </b><?= $row['enf_or_adu'] ?></p>
                            <?php
                            $f_id=$row['fournisseur_id'];
                            $qf="SELECT * FROM `suppliers` where id=$f_id and archived=0";
                            $rf=mysqli_query($dbc,$qf);
                            $rowf=mysqli_fetch_assoc($rf);
                            ?>
                            <p><b>Fournisseur : </b><?= $rowf['fullname'] ?></p>
                            <p><b>La quantité : </b><?= $row['qte'] ?></p>
                            <p><b>Seuil minimal : </b><?= $row['seuil_min'] ?></p>
                            <p><b>Prix d'achat : </b><?= $row['prix_a'] ?> DA</p>
                            <p><b>Prix de vente : </b><?= $row['prix_v'] ?> DA</p>
                          </div>
                            <div class="col-md-6">
                          <p><b>date d'insertion : </b><?= $row['date'] ?></p>
                            <a href="update_glasses.php?id=<?= $row['id'] ?>">
                              <button type="button" class="btn btn-success btn-block">Modifier ce article</button>
                            </a>
                            <br>
                              <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art1<?= $row['id'] ?>">Supprimer ce article</button>

                             <!-- Logout Modal-->
                            <div class="modal fade" id="delete_art1<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un article</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">Voulez-vous vraiment supprimer ce article ?</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <a class="btn btn-primary" href="delete_art.php?type=1&id=<?= $row['id'] ?>">Oui</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                          <?php
                            }elseif ($_GET['type']==2) {
                          ?>
                          <h3>Verre</h3>
                            <p><b>Code : </b>glass_<?= $row['id'] ?></p>
                            <p><b>Le type de verre : </b><?= $row['org_or_min'] ?></p>
                            <p><b>Indice : </b><?= $row['indice'] ?></p>
                            <p><b>Type : </b><?= $row['type'] ?></p>
                            <p><b>Puissance - SPH : </b><?= $row['sph'] ?></p>
                            <p><b>Puissance - CYL : </b><?= $row['cyl'] ?></p>
                            <p><b>Puissance - AD : </b><?= $row['ad'] ?></p>
                            <p><b>Type de traitement : </b><?= $row['type_de_trait'] ?></p>
                            <?php
                            $f_id=$row['fournisseur_id'];
                            $qf="SELECT * FROM `suppliers` where id=$f_id and archived=0";
                            $rf=mysqli_query($dbc,$qf);
                            $rowf=mysqli_fetch_assoc($rf);
                            ?>
                            <p><b>Fournisseur : </b><?= $rowf['fullname'] ?></p>
                            <p><b>La quantité : </b><?= $row['qte'] ?></p>
                            <p><b>Seuil minimal : </b><?= $row['seuil_min'] ?></p>
                            <p><b>Prix d'achat : </b><?= $row['prix_a'] ?> DA</p>
                            <p><b>Prix de vente : </b><?= $row['prix_v'] ?> DA</p>
</div>
                            <div class="col-md-6">
                          <p><b>date d'insertion : </b><?= $row['date'] ?></p>
                            <a href="update_glass.php?id=<?= $row['id'] ?>">
                              <button type="button" class="btn btn-success btn-block">Modifier ce article</button>
                            </a>
                            <br>
                              <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art2<?= $row['id'] ?>">Supprimer ce article</button>

                             <!-- Logout Modal-->
                            <div class="modal fade" id="delete_art2<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un article</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">Voulez-vous vraiment supprimer ce article ?</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <a class="btn btn-primary" href="delete_art.php?type=2&id=<?= $row['id'] ?>">Oui</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                          <?php    
                            }elseif ($_GET['type']==3) {
                          ?>
                          <h3>Lentille</h3>
                            <p><b>Code : </b>lenses_<?= $row['id'] ?></p>
                            <p><b>Le type de verre : </b><?= $row['type_de_len'] ?></p>
                            <p><b>Puissance - SPH : </b><?= $row['sph'] ?></p>
                            <p><b>Puissance - CYL : </b><?= $row['cyl'] ?></p>
                            <p><b>Puissance - Axe : </b><?= $row['axe'] ?></p>
                            <p><b>Puissance - Rayon : </b><?= $row['rayon'] ?></p>
                            <p><b>Puissance - Diametre : </b><?= $row['diametre'] ?></p>
                            <p><b>Puissance - K1 : </b><?= $row['k1'] ?></p>
                            <p><b>Puissance - K2 : </b><?= $row['k2'] ?></p>
                            <p><b>Sclerale : </b><?= $row['sclerale'] ?></p>
                            <?php
                            $f_id=$row['fournisseur_id'];
                            $qf="SELECT * FROM `suppliers` where id=$f_id and archived=0";
                            $rf=mysqli_query($dbc,$qf);
                            $rowf=mysqli_fetch_assoc($rf);
                            ?>
                            <p><b>Fournisseur : </b><?= $rowf['fullname'] ?></p>
                            <p><b>La quantité : </b><?= $row['qte'] ?></p>
                            <p><b>Seuil minimal : </b><?= $row['seuil_min'] ?></p>
                            <p><b>Prix d'achat : </b><?= $row['prix_a'] ?> DA</p>
                            <p><b>Prix de vente : </b><?= $row['prix_v'] ?> DA</p>
</div>
                            <div class="col-md-6">
                          <p><b>date d'insertion : </b><?= $row['date'] ?></p>
                            <a href="update_lenses.php?id=<?= $row['id'] ?>">
                              <button type="button" class="btn btn-success btn-block">Modifier ce article</button>
                            </a>
                            <br>
                              <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art3<?= $row['id'] ?>">Supprimer ce article</button>

                             <!-- Logout Modal-->
                            <div class="modal fade" id="delete_art3<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un article</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">Voulez-vous vraiment supprimer ce article ?</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <a class="btn btn-primary" href="delete_art.php?type=3&id=<?= $row['id'] ?>">Oui</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                          <?php    
                            }elseif ($_GET['type']==4) {
                          ?>
                          <h3>Implant</h3>
                            <p><b>Code : </b>implants_<?= $row['id'] ?></p>
                            <p><b>type : </b><?= $row['type'] ?></p>
                            <p><b>Puissance : </b><?= $row['puissance'] ?></p>
                            <p><b>Marque : </b><?= $row['marque'] ?></p>
                            <?php
                            $f_id=$row['fournisseur_id'];
                            $qf="SELECT * FROM `suppliers` where id=$f_id and archived=0";
                            $rf=mysqli_query($dbc,$qf);
                            $rowf=mysqli_fetch_assoc($rf);
                            ?>
                            <p><b>Fournisseur : </b><?= $rowf['fullname'] ?></p>
                            <p><b>La quantité : </b><?= $row['qte'] ?></p>
                            <p><b>Seuil minimal : </b><?= $row['seuil_min'] ?></p>
                            <p><b>Prix d'achat : </b><?= $row['prix_a'] ?> DA</p>
                            <p><b>Prix de vente : </b><?= $row['prix_v'] ?> DA</p>
</div>
                            <div class="col-md-6">
                          <p><b>date d'insertion : </b><?= $row['date'] ?></p>
                            <a href="update_implants.php?id=<?= $row['id'] ?>">
                              <button type="button" class="btn btn-success btn-block">Modifier ce article</button>
                            </a>
                            <br>
                              <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art4<?= $row['id'] ?>">Supprimer ce article</button>

                             <!-- Logout Modal-->
                            <div class="modal fade" id="delete_art4<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un article</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">Voulez-vous vraiment supprimer ce article ?</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <a class="btn btn-primary" href="delete_art.php?type=4&id=<?= $row['id'] ?>">Oui</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                          <?php    
                            }elseif ($_GET['type']==5) {
                          ?>
                          <h3>Produit d'entretien</h3>
                            <p><b>Code : </b>produit_entre_<?= $row['id'] ?></p>
                            <p><b>Article : </b><?= $row['article'] ?></p>
                            <p><b>Marque : </b><?= $row['marque'] ?></p>
                            <?php
                            $f_id=$row['fournisseur_id'];
                            $qf="SELECT * FROM `suppliers` where id=$f_id and archived=0";
                            $rf=mysqli_query($dbc,$qf);
                            $rowf=mysqli_fetch_assoc($rf);
                            ?>
                            <p><b>Fournisseur : </b><?= $rowf['fullname'] ?></p>
                            <p><b>La quantité : </b><?= $row['qte'] ?></p>
                            <p><b>Seuil minimal : </b><?= $row['seuil_min'] ?></p>
                            <p><b>Prix d'achat : </b><?= $row['prix_a'] ?> DA</p>
                            <p><b>Prix de vente : </b><?= $row['prix_v'] ?> DA</p>
</div>
                            <div class="col-md-6">
                          <p><b>date d'insertion : </b><?= $row['date'] ?></p>
                            <a href="update_produit_entre.php?id=<?= $row['id'] ?>">
                              <button type="button" class="btn btn-success btn-block">Modifier ce article</button>
                            </a>
                            <br>
                              <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art5<?= $row['id'] ?>">Supprimer ce article</button>

                             <!-- Logout Modal-->
                            <div class="modal fade" id="delete_art5<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un article</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">Voulez-vous vraiment supprimer ce article ?</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <a class="btn btn-primary" href="delete_art.php?type=5&id=<?= $row['id'] ?>">Oui</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                          <?php    
                            }elseif ($_GET['type']==6) {
                          ?>
                          <h3>Autre</h3>
                            <p><b>Code : </b>other_<?= $row['id'] ?></p>
                            <p><b>Designation : </b><?= $row['designation'] ?></p>
                            <?php
                            $f_id=$row['fournisseur_id'];
                            $qf="SELECT * FROM `suppliers` where id=$f_id and archived=0";
                            $rf=mysqli_query($dbc,$qf);
                            $rowf=mysqli_fetch_assoc($rf);
                            ?>
                            <p><b>Fournisseur : </b><?= $rowf['fullname'] ?></p>
                            <p><b>La quantité : </b><?= $row['qte'] ?></p>
                            <p><b>Seuil minimal : </b><?= $row['seuil_min'] ?></p>
                            <p><b>Prix d'achat : </b><?= $row['prix_a'] ?> DA</p>
                            <p><b>Prix de vente : </b><?= $row['prix_v'] ?> DA</p>
</div>
                            <div class="col-md-6">
                          <p><b>date d'insertion : </b><?= $row['date'] ?></p>
                            <a href="update_other.php?id=<?= $row['id'] ?>">
                              <button type="button" class="btn btn-success btn-block">Modifier ce article</button>
                            </a>
                            <br>
                              <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art6<?= $row['id'] ?>">Supprimer ce article</button>

                             <!-- Logout Modal-->
                            <div class="modal fade" id="delete_art6<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un article</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">Voulez-vous vraiment supprimer ce article ?</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <a class="btn btn-primary" href="delete_art.php?type=6&id=<?= $row['id'] ?>">Oui</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                          <?php    
                            }
                          ?>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-4 order-lg-1">
            <img src="img/avatar.jpg" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <br><br><br>
        </div> -->
    </div>
    <hr>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
        include 'footer.html';
        ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
