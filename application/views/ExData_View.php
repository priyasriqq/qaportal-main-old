<form method="POST" id="idForm">
          
          <div style="margin-top:20px">
              <label style="margin-left:20px">Date:</label>
              <input id="startDate" name="startDate" />
              <button type="button" onclick="submit() ">Go</button>
  
          </div>
      </form>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
       function create () {
          $.ajax({
            url:"Execution_Model.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data:{startDate:document.getElementById("startDate").value}
           });
     }
  </script>