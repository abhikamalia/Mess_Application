//ALLOW ONLY ALPHABETS
 function onlyAlphabets(e, t) {
			try {
			
                if (window.event) {
					
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
				
				if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)|| (charCode==32)|| (charCode==8))
                    return true;
                else
                    return false;
				
			
				}

            catch (err) {

                alert(err.Description);

            }

        }
//ALPHANUMBER VALIDATION
	function onlyAlphaNum(e, t) {
			try {
			
                if (window.event) {
					
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
				
				if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)|| (charCode==32)|| (charCode==8)||(charCode > 47 && charCode < 58))
                    return true;
                else
                    return false;
				
			
				}

            catch (err) {

                alert(err.Description);

            }

        }	


//NUMBER VALIDATION
	function onlyNum(e, t) {
			try {
			
                if (window.event) {
					
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
				
				if ((charCode==8)||(charCode > 47 && charCode < 58))
                    return true;
                else
                    return false;
				
			
				}

            catch (err) {

                alert(err.Description);

            }

        }	
		
		
// CONFIRMATION FOR DELETE OPERATION
function del()
{
	if(confirm("Do you really want to delete this record??"))	
	{
		return true;	
	}
	else
	{
		return false;	
	}
}
