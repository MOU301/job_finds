
<footer class="mb-3 d-flex justify-content-center">
    <p>Copyright &copy; 2024 , <span class="color2">JopFind</span></p>
</footer>
</div>

    </div>
    <script src="templates/settes/jequery.js"></script>
<script>
        //notes name of the function must be 'search' to function  works 
    function search(str){
        if(str.length!=0){
            var xml=new XMLHttpRequest();
            xml.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    if(this.responseText!=""){
                    document.getElementById('find').innerHTML=this.responseText;
                     sear=document.getElementById('find');
                     var count=sear.children.length;
                     for(var i=0 ; i<count; i=i+1){
                     sear.children[i].addEventListener('click',function (){
                        console.log(this.textContent);
                        document.getElementById('job').value=this.textContent;
                       
                     });
                     }
                }
                else{
                    document.getElementById('find').innerHTML='Sorry !!, There are not Jobs';

                }
            }
            }
            xml.open('GET','find.php?q='+str,true);
            xml.send();
        }
        else{
            document.getElementById('find').innerHTML='';
        }
        
 
    }
    

    
    
</script>
</body>
</html>