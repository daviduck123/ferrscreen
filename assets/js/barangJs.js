$(document).ready(function(){

  $('#checkLow').change(function() 
  {
    if(this.checked) 
    {
      var html='<label class="control-label">Kode</label>'+
             '<div class="controls">'+
                '<input type="text" name="kodeBarang" id="kodeBarang">'+
              '</div>'+
              '<label class="control-label">Pilih Merk Barang</label>'+
              '<div class="controls">'+
                '<select style class="form-control col-xs-3" id="pilihMerkBarangLow">'+
                  '<option>Vagrant</option>'+
                  '<option>Vary</option>'+
                  '<option>Jean</option>'+
                  '<option>Cell</option>'+
                '</select>'+
              '</div>'+
              '<label class="control-label">Harga Low</label>'+
              '<div class="controls">'+
                '<input type="number" name="hargaLow" id="hargaLow">'+
              '</div>'+
              '<label class="control-label">Deskripsi Barang</label>'+
              '<div class="controls">'+
                '<textarea rows="4" cols="50"></textarea>'+
              '</div>';
      $("#tempatLow").html(html);
    } 
    else 
    {
      $("#tempatLow").html("");
    } 
  });
});