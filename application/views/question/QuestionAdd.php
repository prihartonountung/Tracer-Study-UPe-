<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?=base_url("question/QuestionAdd/proses")?>" method="post">
                    <div class="form-group" >
                    <label>Tipe Pertanyaan</label>
                    <select class="form-control" name="type"/>
                    <option value="text"> Text</option>
                    <option value="paragraph"> Paragraf</option>
                    <option value="select"> Select</option>
                    
                    </select>
                </div>
                    
                <div class="form-group" >
                    <label>Pertanyaan</label>
                    <input type="text"  class="form-control" name="the_question" required/>
                </div>
                
                <div class="form-group" >
                    <label>Option</label>
                    <textarea class= "form-control" rows = "4" name="options" required/></textarea>
                </div>

                <div class="form-group" >
                    <label>Status</label>
                    <input type="radio"  name="status" value="active" required/>active
                    <input type="radio"  name="status" value="archived" required/>archived
                </div>

                <div class="form-group" >
                    <label>Ordering</label>
                    <input type="text"  class="form-control" name="ordering" required/>
                </div>

                    <input type="submit" value="Proses" class="btn btn-primary mt-5 d-block mx-auto" />

                    </form>                
                </div>
            </div>
        </div> 
    </div>
</div>
