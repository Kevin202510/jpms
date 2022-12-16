<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#28a745;">
        <h5 style="margin-left:190px; font-weight: bold;  color:black;" class="modal-title" id="exampleModalLabel">Upload CV</h5>
        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="uploadCV.php" enctype="multipart/form-data">
            <input type="text" name="user_id" id="user_id" >
            <input type="hidden" name="uploadCV">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="filesToUpload" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
        <div class="modal-footer">
          <button  style="border-radius:20px; margin-right:10px; background-color:#28a745;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  style="border-radius:20px; margin-right:105px; background-color:#28a745;" type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#28a745;">
        <h5 style="margin-left:135px; font-weight: bold;  color:black;" class="modal-title" id="exampleModalLabel">Upload CV</h5>
        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="uploadCV.php" enctype="multipart/form-data">
            <input type="hidden" name="user_id" id="idmoto">
            <input type="hidden" name="uploadProfile">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="filesToUpload" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>