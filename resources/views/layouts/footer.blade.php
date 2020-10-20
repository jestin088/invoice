<footer class="main-footer">
    <strong>Copyright &copy; <?=date('Y');?> <a href="http://titipin.id">Titipin</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> Beta
    </div>
</footer>

<script>
    var loadFile = function(event) {
        if(event.target.files[0]){
            var image = document.getElementById('image');
            $("#image-field").removeClass('d-none');
            image.src = URL.createObjectURL(event.target.files[0]);
            $("#old-image-field").addClass('d-none');
        }else{
            $("#image-field").addClass('d-none');
            $("#old-image-field").removeClass('d-none');
        }
    };

    var loadFileMultiple = function(event) {
        if(window.File && window.FileList && window.FileReader){
            var filesInput = document.getElementById("files");
            
            filesInput.addEventListener("change", function(event){
                
                var files = event.target.files; //FileList object
                var output = document.getElementById("file_preview");
                
                for(var i = 0; i< files.length; i++){

                    alert(i);

                    var file = files[i];
                    
                    //Only pics
                    if(!file.type.match('image'))
                    continue;
                    
                    var picReader = new FileReader();
                    
                    picReader.addEventListener("load",function(event){
                        
                        var picFile = event.target;
                        
                        var div = document.createElement("div");
                        
                        div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                "title='" + picFile.name + "'/>";
                        
                        output.insertBefore(div,null);            
                    
                    });
                    
                    //Read the image
                    picReader.readAsDataURL(file);
                }                               
            
            });
        }
        else
        {
            console.log("Your browser does not support File API");
        }
    }
</script>