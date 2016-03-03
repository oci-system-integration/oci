<script>
  function check() {
	  ptrP1 = document.getElementById("new_password")
      ptrP2 = document.getElementById("check_password")
	 
 
	 
	  if (   ptrP1.value !=  ptrP2.value  )  
	    {   document.getElementById("new_password").value=""
		document.getElementById("check_password").value=""//ERASE 2ND FIELDS CONTENTS
		     alert("passwords do not match");//WARN USER -- LOOK AT SPAN ELT
			 
		 } 
  					}
</script>