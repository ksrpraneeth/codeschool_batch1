<?php
include 'header.php';
include 'sidebar.php';
?>
            <form class="card p-3">
              <div class="mb-4">
                <label for="Title" class="form-label">Title</label>
                <input type="text" class="form-control" id="Title" required />
              </div>
              <div class="mb-4">
                <label for="Description" class="form-label">Description</label>
              <textarea class="form-control" id="Description" required >
</textarea>
              </div>
              <div class="mb-4">
                <label for="Tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="Tags" required/>
              </div>
              <div class="d-grid">
                <button type ="submit" id="submitbutton" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
    $("#submitbutton").click(function (){
              event.preventDefault();
              var formData = {
             Title:$("#Title").val(),
             Description:$("#Description").val(),
             Tags:$("#Tags").val(),
              };
    $.ajax({
        type:"POST",
        data:formData,
        url:"api/addtask.php",
        success:function(responsedata){
                  console.log(responsedata);
                  responsedata=JSON.parse(responsedata);
                  if(!responsedata.status){
                    $('#errors').text(responsedata.message);
                  }else{
                    alert(responsedata.message);
                  }
                  },
                  error: function(){
                  }
                });
            })
          </script>
<?php
include 'footer.php';
?>