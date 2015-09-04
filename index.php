<?php
	include 'header.inc';
?>
<div class="box" id="box">
    <div class="box1">
        <div class="picbox" style="display:block;">
            <img src="images/1.jpg" />
            <div class="shadow"></div>
            <p class="title">1</p>
        </div>
        <div class="picbox">
            <img src="images/2.jpg" />
            <div class="shadow"></div>
            <p class="title">2</p>
        </div>
        <div class="picbox">
            <img src="images/3.jpg" />
            <div class="shadow"></div>
            <p class="title">3</p>
        </div>
        <div class="picbox">
            <img src="images/4.jpg" />
            <div class="shadow"></div>
            <p class="title">4</p>
        </div>
        <div class="picbox">
            <img src="images/5.jpg" />
            <div class="shadow"></div>
            <p class="title">5</p>
        </div>
        <div class="picbtn" id="btn">
            <a href="javascript:void(0)" class="act"></a>
            <a href="javascript:void(0)"></a>
            <a href="javascript:void(0)"></a>
            <a href="javascript:void(0)"></a>
            <a href="javascript:void(0)"></a>
        </div>
    </div>
</div>


<script type="text/javascript">
    window.onload=function(){
        var oBox=document.getElementById('box');
        var oBtn=document.getElementById('btn');
        var aBtn=oBtn.getElementsByTagName('a');
        //alert(aBtn.length);
        var aPicText=getByclass('picbox',oBox);
        for(var i=0;i<aBtn.length;i++){
            aBtn[i].index=i;
            aBtn[i].onmouseover=function(){
                for(var n=0;n<aBtn.length;n++){
                    aPicText[n].style.display="none";
                    aBtn[n].className='';
                }
                aPicText[this.index].style.display="block"
                this.className='act';
            }
        }
        function getByclass(sName,oParent){
            var obj=oParent.getElementsByTagName('*');
            var result=[];
            for(var i=0;i<obj.length;i++){
                if(obj[i].className==sName){
                    result.push(obj[i]);
                }
            }
            return result;
        }
    }
</script>

<?php
    include 'footer.inc';
?>