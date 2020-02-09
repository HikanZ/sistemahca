<form action="#" method="post">
  <div class="container">
    <div class="accordion" id="accordion" name="accordion">
    <?php
      while($rowGroup = mysqli_fetch_assoc($resultGroup)){
    ?>
      <div class="card">
        <div class="card-header" id="heading<?php echo $rowGroup['numGroup']; ?>">
          <h5 class="mb-0"  data-toggle="collapse" data-target="#collapse<?php echo $rowGroup['numGroup']; ?>" aria-expanded="<?php if ($rowGroup['numGroup']==1) echo 'true'; else echo 'false';?>" aria-controls="collapse<?php echo $rowGroup['numGroup']; ?>" href="#collapse<?php echo $rowGroup['numGroup']; ?>">
            <button class="<?php if ($rowGroup['numGroup']==1) echo 'btnA'; else echo 'btnA collapsed';?>" type="button">
              Grupo <?php echo $rowGroup['numGroup']; ?>: <?php echo " "; echo $rowGroup['nameGroup']; ?>
            </button>
          </h5>
        </div>
        <div id="collapse<?php echo $rowGroup['numGroup']; ?>" class="<?php if ($rowGroup['numGroup']==1) echo 'collapse show'; else echo 'collapse';?>" aria-labelledby="heading<?php echo $rowGroup['numGroup']; ?>" data-parent="#accordion">
          <div class="card-body">
          <?php
            ///// Carrega os ROPs dessa versão
            $sql = "SELECT * FROM rop WHERE versionRop=? AND idGroup=?";
            $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
            if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
              header("Location: audit.php?error=sqlerror3"); //Retornará à pag anterior
              exit();
            }
            else{ //Se a conexão for bem sucedida, fará a verificação
              mysqli_stmt_bind_param($stmt, "ii", $version, $rowGroup['idGroup']);
              mysqli_stmt_execute($stmt);
              $resultRop = mysqli_stmt_get_result($stmt);
              while($rowRop = mysqli_fetch_assoc($resultRop)){
          ?>
                <div id="example-<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>" class="content" display="flex">
                  <div class="row">
                    <div class="col-md-1 my-auto">
                      <button type="button" id="btnAdd-<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>" class="btn btn-primary btn-sm" style="width:35px; height:35px; font-size:15px; background:#337ab7; border:none;">
                        <i class="fas fa-plus" style="width:20px; height:20px; font-size:10px;"></i>
                      </button>
                    </div>
                    <div class="col-md-11 my-auto" style="font-size:15px;">
                      <?php echo $rowGroup['numGroup']; echo "."; echo $rowRop['numRop']; echo ". "; echo $rowRop['labelRop'];?>
                    </div>
                  </div>
                  <div class="row group">
                    <div class="col-md-7 my-auto" style="font-size:15px;">
                      <button type="button" class="btn btn-danger btnRemove btn-sm" style="width:35px; height:35px; font-size:15px; background:#d9534f; border:none;">
                        <i class="fas fa-minus" style="width:20px; height:20px; font-size:10px;"></i>
                      </button>
                      <div class="stv-radio-buttons-wrapper">
                        <input type="radio" class="stv-radio-button" name="rop<?php echo$rowGroup['numGroup'].$rowRop['numRop'];?>[0]" value="C" id="rop<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>1" checked />
                        <label for="rop<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>1" style="width:100px;">Conforme</label>
                        <input type="radio" class="stv-radio-button" name="rop<?php echo$rowGroup['numGroup'].$rowRop['numRop'];?>[0]" value="NC" id="rop<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>2" />
                        <label for="rop<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>2" style="width:130px;">Não conforme</label>
                        <input type="radio" class="stv-radio-button" name="rop<?php echo$rowGroup['numGroup'].$rowRop['numRop'];?>[0]" value="P" id="rop<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>3" />
                        <label for="rop<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>3" style="width:100px;">Parcial</label>
                        <input type="radio" class="stv-radio-button" name="rop<?php echo$rowGroup['numGroup'].$rowRop['numRop'];?>[0]" value="NA" id="rop<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>4" />
                        <label for="rop<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>4" style="width:120px;">Não aplica</label>
                      </div>
                      <input type="text" name="info<?php echo $i; echo $j; ?>[]" placeholder="Informação adicional" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Informação adicional'"
                       class="single-input" style="width:250px; top:-50px;">
                    </div>
                  </div>
                </div>
          <?php
              }
            }
          ?>
          </div>
        </div>
      </div> <!-- END CARD -->
    <?php
      }
    ?>
  </div> <!-- END ACCORDIONS -->
  </div>
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <small>&nbsp;</small>
      <button class="btn" type="submit" name="usuario-cadastrar">Gravar Auditoria</button>
    </div>
  </div>
</form>
