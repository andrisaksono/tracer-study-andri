<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                <form action="<?=base_url("question/addquestion/proses")?>" method="post">

<div class="form-group">
    <label>Tipe</label>
    <select class= "form-control" name="type">
        <option value="text">Text</option>
        <option value="paragraph">Paragraf</option>
        <option value="select">Select</option>
    </select>
</div>

<div class="form-group">
    <label>Pertanyaan</label>
    <input type="text" class= "form-control" name="the_question" required/>
</div>
<div class="form-group">
    <label>Opsi</label>
    <textarea class= "form-control" rows = "5" name="options" required></textarea>
</div>

<div class="form-group">
    <label>Status</label>
    <input type="radio" name= "status" value= "active" required/>Active
    <input type="radio" name= "status" value= "archived" required/>Archived
</div>
<div class="form-group">
    <label>Ordering</label>
    <input type="int" class= "form-control" name="ordering" required/>
</div>

<input type="submit" value="Proses" class="btn btn-primary btn-block mt-3"/>

</form>
                </div>
            </div>
        </div>
    </div>
</div>