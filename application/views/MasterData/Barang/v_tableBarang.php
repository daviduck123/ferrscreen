<?php 
  if(isset($dataBarang))
  {
      $number=1;
      foreach ($dataBarang as $barang) 
      {
          $btn = false;
          ?>
          <tr class="gradeX">
            <td style = "vertical-align: middle;"><?php echo $number ?></td>
            <td style = "vertical-align: middle;"><?php echo $barang['nama'] ?></td>
            <td style = "vertical-align: middle;"><?php echo $barang['min_stok'] ?></td>
            <td style = "vertical-align: middle;">
              <?php echo $barang['total_stok']; ?>
              <button style='float:right; margin-left: 3px;' class="btn btn-info btn-mini" data-toggle="modal" data-target="#detailModal"
                data-id="<?php echo $barang['id']; ?>"
                data-title="Detail Stok"
                onclick="OpenModal(<?php echo $number; ?>)"
                id="btnModal<?php echo $number; ?>"
                >Detail Stok</button>
              <button style='float:right; margin-left: 3px;' class="btn btn-success btn-mini" data-backdrop="static" data-toggle="modal" data-keyboard="false" data-target="#updateModal"
                data-id="<?php echo $barang['id']; ?>"
                data-title="Update Stok"
                onclick="OpenModal(<?php echo $number; ?>)"
                id="btnModal<?php echo $number; ?>"
                >Update Stok</button>
            </td>
            <td style = "vertical-align: middle;">
               <?php foreach($barang["detail_barang"] as $detail){ ?>
                  <?php echo $detail['kode'] ;?></br>
               <?php } ?>
            </td>
             <td style = "vertical-align: middle;">
               <?php foreach($barang["detail_barang"] as $detail){ ?>
                  <?php echo $detail['nama_merk']; ?></br>
             <?php } ?>
            </td>
             <td style = "vertical-align: middle;">
               <?php foreach($barang["detail_barang"] as $detail){ ?>
                  <?php echo $detail['harga']; ?></br>
              <?php } ?>
            </td>
             <td style = "vertical-align: middle;">
               <?php foreach($barang["detail_barang"] as $detail){ ?>
                  <?php echo $detail['deskripsi']; ?></br>
              <?php } ?>
            </td>
            <td style = "vertical-align: middle;">
              <a href="<?php echo base_url();?>barang/editBarang/<?php echo $barang["id"] ?>" class="btn btn-warning btn-mini" role="button">Edit</a>
              <a href="#deleteData<?php echo $barang["id"] ?>" data-toggle="modal" class="btn btn-danger btn-mini" role="button">Hapus</a>
              <div id="deleteData<?php echo $barang["id"] ?>" class="modal hide" aria-hidden="true" style="display: none;">
                <div class="modal-header">
                  <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>Hapus Data</h3>
                </div>
                <div class="modal-body">
                  <p>Apakah kamu ingin menghapus data <?php echo $barang["nama"] ?>?</p>
                </div>
                <div class="modal-footer"> 
                  <a class="btn btn-primary" href="<?php echo base_url();?>barang/hapusBarang/<?php echo $barang["id"] ?>" name="btnHapus">Hapus</a> 
                  <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
                </div>
              </div>
            </td>
          </tr>
          <?php 
        $number++;
      }
    }
?>

<script type="text/javascript" charset="utf-8">
    function OpenModal(angka)
    {
        var title = $("#btnModal"+angka).data('title');
        var id = $("#btnModal" + angka).data('id');
      
        document.getElementById("id").innerHTML = id;

        var dataBarang = <?php echo json_encode($dataBarang) ?>;
        var dataSupplier = <?php echo json_encode($dataSupplier) ?>;
        var dataType = <?php echo json_encode($dataType) ?>;

        //console.log(dataBarang);
        //console.log(dataSupplier);
        //console.log(dataType);

        //For Opening Modal
        processDetailModal(dataBarang, id);
        processUpdateModal(dataBarang, dataSupplier, dataType, id);

        $(".modal-body #id").val(id);
        $(".modal-title").text(title);
    }

    function processDetailModal(dataBarang, id){
        var html = "<table class='table table-bordered' id='tableDetail'>";
        html    += "  <thead>"
        html    += "    <tr>";
        html    += "      <th>Supplier</th>";
        html    += "      <th>Type</th>";
        html    += "      <th>Stok</th>";
        html    += "    </tr>";
        html    += "  </thead>"
        html    += "  <tbody>"
        for(var i = 0 ; i < dataBarang.length; i++){
          if(Number(dataBarang[i]['id']) === Number(id)){

            var supplier_barang = dataBarang[i]['supplier_barang'];
            for(var j = 0 ; j < supplier_barang.length; j++){
              html += "<tr>";
              html += "<td>"+ supplier_barang[j]['nama_supplier'] +"</td>";
              html += "<td>"+ supplier_barang[j]['nama_type'] +"</td>";
              html += "<td>"+ supplier_barang[j]['stok'] +"</td>";
              html += "</tr>";
            }
          }
        }
        html    += "  </tbody>"
        html    += "</table>"

        $("#divDetailBarang").html(html);

        $('#tableDetail').dataTable({
          "bJQueryUI": true,
          "sPaginationType": "full_numbers",
          "sDom": '<""l>t<"F"fp>'
        });
    }

    function processUpdateModal(dataBarang, dataSupplier, dataType, id){
        var dataBarangUsed = null;
        for(var i = 0 ; i < dataBarang.length; i++){
          if(Number(dataBarang[i]['id']) === Number(id)){
            dataBarangUsed = dataBarang[i];
          }
        }

        var dataSupplierBarang = dataBarangUsed["supplier_barang"];
        var options = "";
        var options2 = "";
        var indexFirstSup = -1;
        var first = false;
        for(var i = 0 ; i < dataSupplier.length; i++){
          var foundSupplier = false;
          var ctrTypeFound = 0;
          for(var k = 0 ; k < dataType.length; k++){
             for(var j = 0 ; j < dataSupplierBarang.length; j++){
               if(dataSupplierBarang[j]['id_supplier'] == dataSupplier[i]['id']
                  && dataSupplierBarang[j]['id_type'] === dataType[k]['id']){
                  ctrTypeFound++;
                }
             }
          }
          /*for(var j = 0 ; j < dataSupplierBarang.length; j++){
            if(dataSupplierBarang[j]['id_supplier'] == dataSupplier[i]['id']){
              foundSupplier = false;
              indexFound = j;
            }
          }*/
          if(ctrTypeFound !== dataType.length){
            options += "<option  value="+dataSupplier[i]['id']+">"+dataSupplier[i]['nama']+"</option>"; 
            if(indexFirstSup === -1)
              indexFirstSup = i;
          }
        }
        if(indexFirstSup >= 0){
          var supFirst = dataSupplier[indexFirstSup];
          for(var k = 0 ; k < dataType.length; k++){
            var foundType = false;
            for(var j = 0 ; j < dataSupplierBarang.length; j++){
              if(dataSupplierBarang[j]['id_supplier'] == dataSupplier[indexFirstSup]['id']
                && dataSupplierBarang[j]['id_type'] === dataType[k]['id']){
                foundType = true;
              }
            }
            if(!foundType){
              options2 += "<option  value="+dataType[k]['id']+">"+dataType[k]['nama']+"</option>";
            }
          }
        }
       

        //Buat tampilan untuk Edit
        var html = "<table class='table table-bordered' id='tableUpdate'>";
        html    += "  <thead>"
        html    += "    <tr>";
        html    += "      <th>Supplier</th>";
        html    += "      <th>Type</th>";
        html    += "      <th>Stok</th>";
        html    += "      <th></th>";
        html    += "    </tr>";
        html    += "  </thead>"
        html    += "  <tbody>"
        html += "<tr>";
        html += "<td>";
        html += "<select class='col-xs-3' name='pilihSupplier' id='pilihSupplier'>;";
        html += options;
        html +='</select>';
        html+="</td>";
        html += "<td>";
        html += "<select class='col-xs-3' name='pilihType' id='pilihType'>;";
        html += options2;
        html +='</select>';
        html+="</td>";
        html += "<td><input type='number' id='tambahStok'/></td>";
        html += '<td><button type="submit" onclick="tambahDetail(this.id)" name="btnTambah" id="'+id+'" class="btn btn-success btn-mini">Tambah</button></td>';
        html += "</tr>";
        for(var i = 0 ; i < dataBarang.length; i++){
          if(Number(dataBarang[i]['id']) === Number(id)){

            var supplier_barang = dataBarang[i]['supplier_barang'];
            for(var j = 0 ; j < supplier_barang.length; j++){
              html += "<tr>";              
              html += "<td><input type='text' value='"+  supplier_barang[j]['nama_supplier']  +"' disabled/></td>";
               html += "<td><input type='text' value='"+  supplier_barang[j]['nama_type']  +"' disabled/></td>";
              html += "<td><input type='number' value='"+  supplier_barang[j]['stok']  +"' id='stok-"+supplier_barang[j]['id_supplier']+"-"+id+"-"+supplier_barang[j]['id_type'] +"'/></td>";
              html += '<td><a class="btn btn-warning btn-mini" onclick="editDetailBarang('+supplier_barang[j]['id_supplier']+','+id+','+supplier_barang[j]['id_type']+')" name="btnEdit">Update</a> ';
              html += '<a class="btn btn-danger btn-mini" onclick="deleteDetailBarang('+supplier_barang[j]['id_supplier']+','+id+','+supplier_barang[j]['id_type']+')" name="btnHapus">Hapus</a></td>';
              html += "</tr>";
            }
          }
        }
        html    += "  </tbody>"
        html    += "</table>"

        $("#divUpdateBarang").html(html);

        $('#tableUpdate').dataTable({
          "bJQueryUI": true,
          "sPaginationType": "full_numbers",
          "sDom": '<""l>t<"F"fp>'
        });

        $("#pilihSupplier").on('change', function(e) {
          alert(this.value );
        });

    }

    function tambahDetail(id)
    {
      var stok = document.getElementById("tambahStok").value;
      if(stok!="")
      {
        var e = document.getElementById("pilihSupplier");
        var f = document.getElementById("pilihType");
        if($('#pilihSupplier').has('option').length > 0 && $('#pilihType').has('option').length > 0) 
        {
          var id_supplier = e.options[e.selectedIndex].value;
          var id_type = f.options[f.selectedIndex].value;

          var dataPost={
              "btnTambah": "btnTambah", 
              "id_supplier" : id_supplier,
              "id_type" : id_type,
              "id_barang": id, 
              "stok": stok, 
              "harga" : 100
          };
          $.ajax({
            url: "<?php echo base_url(); ?>barang/prosesTambahDetailBarang",
            type: 'POST',
            data: dataPost,
            dataType: 'jsonp',
            contentType: "application/x-www-form-urlencoded",
            async: false,
          }).done(function(data){
          });

           $.ajax({
              url: "<?php echo base_url(); ?>Barang/get_allBarang",
              type: 'GET',
              success: function (data) {
                  var datax = JSON.parse(data);
                  var dataBarang = datax["dataBarang"];
                  var dataSupplier = datax["dataSupplier"];
                  var dataType = datax["dataType"];
                  processUpdateModal(dataBarang, dataSupplier, dataType, id);
                  $('#tBodyBarang').load('<?php echo base_url();?>/Barang/load_tableBarang');
              },
              error: function(xhr, status, error) {
                alert(xhr.responseText);
              }
           });
        }
      }
      else
      {
        alert("Mohon isi jumlah stok");
      }
    }

    function editDetailBarang(id_supplier, id_barang, id_type){
      var stok = $("#stok-"+id_supplier+"-"+id_barang+"-"+id_type).val();
      var dataPost={
              "btnUpdate": "btnUpdate", 
              "id_supplier" : id_supplier,
              "id_type" : id_type,
              "id_barang": id_barang, 
              "stok": stok, 
              "harga" : 0
            };
      $.ajax({
        url: "<?php echo base_url(); ?>barang/update_supplierBarang",
        type: 'POST',
        data: dataPost,
        dataType: 'jsonp',
        contentType: "application/x-www-form-urlencoded",
        async: false,
      }).done(function(data){
      });

       $.ajax({
          url: "<?php echo base_url(); ?>Barang/get_allBarang",
          type: 'GET',
          success: function (data) {
              var datax = JSON.parse(data);
              var dataBarang = datax["dataBarang"];
              var dataSupplier = datax["dataSupplier"];
              var dataType = datax["dataType"];
              processUpdateModal(dataBarang, dataSupplier,dataType, id_barang);
              $('#tBodyBarang').load('<?php echo base_url();?>/Barang/load_tableBarang');
          },
          error: function(xhr, status, error) {
            alert(xhr.responseText);
          }
       });
    }

    function deleteDetailBarang(id_supplier, id_barang, id_type){
      var stok = $("#stok-"+id_supplier+"-"+id_barang+"-"+id_type).val();
      var dataPost={
              "btnDelete": "btnDelete", 
              "id_supplier" : id_supplier,
              "id_type" : id_type,
              "id_barang": id_barang
            };
      $.ajax({
        url: "<?php echo base_url(); ?>barang/hapus_supplierBarang",
        type: 'POST',
        data: dataPost,
        dataType: 'jsonp',
        contentType: "application/x-www-form-urlencoded",
        async: false,
      }).done(function(data){
      });

       $.ajax({
          url: "<?php echo base_url(); ?>Barang/get_allBarang",
          type: 'GET',
          success: function (data) {
              var datax = JSON.parse(data);
              var dataBarang = datax["dataBarang"];
              var dataSupplier = datax["dataSupplier"];
              var dataType = datax["dataType"];
              processUpdateModal(dataBarang, dataSupplier, dataType, id_barang);
              $('#tBodyBarang').load('<?php echo base_url();?>/Barang/load_tableBarang');
          },
          error: function(xhr, status, error) {
            alert(xhr.responseText);
          }
       });
    }

</script>