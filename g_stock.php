<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_POST['submit'])) {
  $client=$_POST['client'];

  $q="INSERT INTO `invoice`(`client_id`) VALUES ('$client')";
  //echo $q;exit();
  $r=mysqli_query($dbc,$q);
  $fact_id = mysqli_insert_id($dbc);
  header('location:g_ventes.php?f='.$fact_id);
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

  <title>Gestion de stock</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" style="background-color: #e8c7d0">

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
          <h1 class="h3 mb-2 text-gray-800">Gestion de stock</h1>
          <p class="mb-4">kach manektbou hna ...</p>
                

                <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <a href="cat.php">
                  <button type="button" class="btn btn-block btn-primary">Ajouter un Article</button>
                </a>
              </div>
              <?php
              /*$q="SELECT * FROM `invoice` ORDER BY id DESC";
              $r=mysqli_query($dbc,$q);
              $row=mysqli_fetch_assoc($r);
              $fact_id=$row['id'];*/
              ?>
              <div class="col-md-6">
                  <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#add_fact">Nouvelle facture</button>
                  <!-- Logout Modal-->
                            <div class="modal fade" id="add_fact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: #5f1411">Nouvelle facture</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="container">
                                  <form class="user" action="g_stock.php" method="post">
                                    <a href="add_client.php" style="color: #5f1411">Ajouter un nouveau client</a>
                                    <div class="form-group">
                                      <label for="sel1">Client</label>
                                      <select class="form-control" id="sel1" name="client" required>
                                        <option></option>
                                        <?php
                                        $q="SELECT * FROM `customers` where archived=0";
                                        $r=mysqli_query($dbc,$q);
                                        while ($row=mysqli_fetch_assoc($r)) {
                                        ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['fullname'] ?></option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-user btn-block" value="Créer une nouvelle facture" style="background-color: #e8c7d0; color: #5f1411">
                                  </form>
                                  <br>
                                  </div>
                                </div>
                              </div>
                            </div>
              </div>
            </div>
          </div>
          <br>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #5f1411">Nos Articles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Code</th><th>Designation</th>
                      <th>Prix de vente</th>
                      <th>Qte</th>
                      <th>Détail</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $q="SELECT * FROM `glasses` WHERE archived=0";
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                      if($row['qte']<=$row['seuil_min']){
                    ?>
                    <tr style="background-color: #ffebd9">
                    <?php
                      }else{
                    ?>
                    <tr>
                    <?php    
                      }
                    ?>
                      <td>glasses_<?= $row['id'] ?></td>
                      <td><?= $row['designation'] ?></td><td><?= $row['prix_v'] ?> DA</td>
                      <td><?= $row['qte'] ?></td>
                      <td>
                        <a href="art_profil.php?type=1&id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-primary">Détail</button>
                        </a>
                      </td>
                      <td>
                        <a href="update_glasses.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-success">Modifier</button>
                        </a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art1<?= $row['id'] ?>">Supprimer</button>

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
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <!-- fgf -->
                     <?php
                    $q="SELECT * FROM `glass` WHERE archived=0";
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                      if($row['qte']<=$row['seuil_min']){
                    ?>
                    <tr style="background-color: #ffebd9">
                    <?php
                      }else{
                    ?>
                    <tr>
                    <?php    
                      }
                    ?>
                      <td>glass_<?= $row['id'] ?></td>
                      <td>SPH=<?= $row['sph'] ?> - CYL=<?= $row['cyl'] ?> - ADD=<?= $row['ad'] ?></td><td><?= $row['prix_v'] ?> DA</td>
                      <td><?= $row['qte'] ?></td>
                      <td>
                        <a href="art_profil.php?type=2&id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-primary">Détail</button>
                        </a>
                      </td>
                      <td>
                        <a href="update_glass.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-success">Modifier</button>
                        </a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art2<?= $row['id'] ?>">Supprimer</button>

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
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <!-- gfgfgf -->
                     <?php
                    $q="SELECT * FROM `lenses` WHERE archived=0";
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                      if($row['qte']<=$row['seuil_min']){
                    ?>
                    <tr style="background-color: #ffebd9">
                    <?php
                      }else{
                    ?>
                    <tr>
                    <?php    
                      }
                    ?>
                      <td>lenses_<?= $row['id'] ?></td>
                      <td>SPH=<?= $row['sph'] ?> - CYL=<?= $row['cyl'] ?> - AXE=<?= $row['axe'] ?> - Rayon=<?= $row['rayon'] ?> - Diamètre=<?= $row['diametre'] ?> - K1=<?= $row['k1'] ?> - K2=<?= $row['k2'] ?> - Sclerale=<?= $row['sclerale'] ?></td><td><?= $row['prix_v'] ?> DA</td>
                      <td><?= $row['qte'] ?></td>
                      <td>
                        <a href="art_profil.php?type=3&id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-primary">Détail</button>
                        </a>
                      </td>
                      <td>
                        <a href="update_lenses.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-success">Modifier</button>
                        </a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art3<?= $row['id'] ?>">Supprimer</button>

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
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <!-- gfdg -->
                     <?php
                    $q="SELECT * FROM `implants` WHERE archived=0";
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                      if($row['qte']<=$row['seuil_min']){
                    ?>
                    <tr style="background-color: #ffebd9">
                    <?php
                      }else{
                    ?>
                    <tr>
                    <?php    
                      }
                    ?>
                      <td>implants_<?= $row['id'] ?></td>
                      <td>Dioptrique=<?= $row['puissance'] ?></td><td><?= $row['prix_v'] ?> DA</td>
                      <td><?= $row['qte'] ?></td>
                      <td>
                        <a href="art_profil.php?type=4&id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-primary">Détail</button>
                        </a>
                      </td>
                      <td>
                        <a href="update_implants.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-success">Modifier</button>
                        </a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art4<?= $row['id'] ?>">Supprimer</button>

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
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <!-- fgdgfd -->
                     <?php
                    $q="SELECT * FROM `produit_entre` WHERE archived=0";
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                      if($row['qte']<=$row['seuil_min']){
                    ?>
                    <tr style="background-color: #ffebd9">
                    <?php
                      }else{
                    ?>
                    <tr>
                    <?php    
                      }
                    ?>
                      <td>produit_entre_<?= $row['id'] ?></td>
                      <td><?= $row['article'] ?></td><td><?= $row['prix_v'] ?> DA</td>
                      <td><?= $row['qte'] ?></td>
                      <td>
                        <a href="art_profil.php?type=5&id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-primary">Détail</button>
                        </a>
                      </td>
                      <td>
                        <a href="update_produit_entre.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-success">Modifier</button>
                        </a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art5<?= $row['id'] ?>">Supprimer</button>

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
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <!-- fdgfdg -->
                     <?php
                    $q="SELECT * FROM `other` WHERE archived=0";
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                      if($row['qte']<=$row['seuil_min']){
                    ?>
                    <tr style="background-color: #ffebd9">
                    <?php
                      }else{
                    ?>
                    <tr>
                    <?php    
                      }
                    ?>
                      <td>other_<?= $row['id'] ?></td>
                      <td><?= $row['designation'] ?></td><td><?= $row['prix_v'] ?> DA</td>
                      <td><?= $row['qte'] ?></td>
                      <td>
                        <a href="art_profil.php?type=6&id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-primary">Détail</button>
                        </a>
                      </td>
                      <td>
                        <a href="update_other.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-success">Modifier</button>
                        </a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_art6<?= $row['id'] ?>">Supprimer</button>

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
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
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
