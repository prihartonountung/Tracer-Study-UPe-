<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?=base_url("public/Form/proses")?>" method="post">

                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" required/>

                    <label>Email</label>
                    <input type="email"  class="form-control" name="email" required/>

                    <input type="submit" value="Proses" class="btn btn-primary mt-5 d-block mx-auto" />

                    </form>                
                </div>
            </div>
        </div> 
    </div>
</div>
