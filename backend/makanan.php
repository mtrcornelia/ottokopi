@section('makanan')
<div class="tm-section-half">    
                    
                    <p>Tambahkan Menu Makanan</p>
                    <form method="post" action="/beritadashboard" enctype="multipart/form-data">
                      
                      <div class="mb-2">
                        <label for="nama" class="form-label">Nama Makanan</label>
                        <input type="text" class="form-control " name="nama" >
                      </div>
                      
                      <div class="mb-2">
                        <label for="file_upload" class="form-label">File Upload</label>
                        <input type="file" class="form-control" name="file_upload"> 
                      </div>

                      <div class="mb-2">
                        <label for="harga" class="form-label">Harga Makanan</label>
                        <input type="text" class="form-control " name="harga" >
                      </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>