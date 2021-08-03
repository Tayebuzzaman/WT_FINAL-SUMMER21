<html>
<script>

   function get(id){
       return document.getElementById(id);
   }
   function search(e){
       if(e.value == ""){
	       get("suggestions").innerHTML = "";
	   }
	   var xhr = new XMLHttpRequest();
	   xhr.open("GET", "P_Sugg.php?key="+e.value, true);
	   xhr.onreadystatechange = function(){
		   if(this.readyState == 4 && this.status == 200){
			   get("suggestions").innerHTML = this.responseText;
		   }
	   };
	   xhr.send();
	   
   }
   </script>
 </html>