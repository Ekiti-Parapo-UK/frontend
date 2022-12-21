<?php
$module = "department";
$shet = "dept";
$typ = "dellvl000";//when we want to delete
$serveradd = $_SERVER['REQUEST_URI'];//when we want to delete
include_once("pages/phead.php");
include_once("pages/pleft.php");
?>

<script type="text/javascript">
    function getCourse(str){
  if(str === ""){
    document.getElementById('dsem').value="";
    //document.getElementById('mid').value="";
    return;
  }
  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
  }
  else{
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
      document.getElementById('dc').innerHTML=xmlhttp.responseText;
      //document.getElementById('mid').value=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getsc.php?q="+str,true);
  xmlhttp.send();
}//end of the function getCourse



function selectall1()
{
//        var formname=document.getElementById(formname); 

    var recslen = document.frmmsg.length;

    if (document.frmmsg.topcheckbox.checked === true)
    {
        for (i = 1; i < recslen; i++) {
            document.frmmsg.elements[i].checked = true;
        }
    }
    else
    {
        for (i = 1; i < recslen; i++)
            document.frmmsg.elements[i].checked = false;
    }
}//end of the funstion selectall()

</script>


</div><!-- leftpanelinner -->
</div><!-- leftpanel -->

<div class="mainpanel">

    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->

    <div class="contentpanel">

        <div class="row">
            <div class="col-md-9 col-lg-8 dash-left">
                <!--This is the beginning of my main contents-->
                <div class="row">
                    <div class="panel panel-inverse panel-site-traffic">
                        <div class="panel-heading">
                            <h4 class="panel-title"> DEFINE COURSES (<?php echo $ezzzy->getval("id",$_REQUEST['id'],"levels","name"); ?>)</h4>
                        </div>

                        <div class="panel-body">
                            <font color="#990000">This option helps you define courses per semester for <?php echo $ezzzy->getval("id",$_REQUEST['id'],"levels","name"); ?></font><br /><br />
                            <strong><?php echo @$_SESSION['msg']; ?></strong>
                            <form name="frmmsg" method="post" action="deflvlc_process.php?typ=new" class="form-horizontal">
                                <input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="lprec" />
                                <input type="hidden" value="<?php echo $serveradd; ?>" name="saddr" />
                                <table class="table-responsive" width="100%">
                                    <!--<tr>
                                        <td width="" bgcolor="#FFFFFF"><b>CHOOSE PROGRAMME:</b></td>
                                        <td width="" bgcolor="#FFFFFF">                                            
                                            <select name="pid" class="form-control">
                                                <option value="">--Select One--</option>
                                                <?php 
                                                  /*$pcat = $ezzzy->getallresult("programmes","name","A");  
                                                  foreach($pcat as $fac){
                                                ?>
                                                <option value="<?php echo $fac['id']; ?>"><?php echo $fac['name']; ?></option>
                                                <?php
                                                  }//end of the if statement that brings out the programme categories*/
                                                ?>
                                            </select>
                                        </td>
                                    </tr>-->
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>SEMESTER for <?php echo $ezzzy->getval("id",$_REQUEST['id'],"levels","name"); ?>:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <select name="dsem" id="dsem" class="form-control" required="required" onchange="getCourse(this.value);">
                                                <option value="">Select One--</option>
                                                <?php 
                                                  $sem = $ezzzy->getallresult("semesters","name","A");  
                                                  foreach($sem as $sems){
                                                ?>
                                                <option value="<?php echo $sems['id']; ?>"><?php echo $sems['name']; ?></option>
                                                <?php
                                                  }//end of the if statement that brings out the programme categories
                                                ?>
                                            </select>
                                        </td>
                                        
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="2"><hr /></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td colspan="">
                                            <p>
                                                <input type="checkbox" name="topcheckbox" class="check" id="topcheckbox" onClick="selectall1();" value="ON" /> <b>Select All</b>
                                            </p>
                                            <p id="dc"></p>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td colsapn="" align="center" bgcolor="#FFFFFF">
                                            <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> DEFINE </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <hr />
                            
                        </div>
                    </div>
                </div>

                <!--/This is the ending of my main contents-->
            </div><!-- col-md-9 -->
<?php include_once("pages/pright.php"); ?>
        </div><!-- row -->

    </div><!-- contentpanel -->

</div><!-- mainpanel -->

</section>

<?php
include_once("pages/pfooter.php");