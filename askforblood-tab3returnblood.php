<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
    <div class="card mb-12 tabbody-card">


        <div class="card-body">
            <div class="container-fluid">

                <div class="form-group col-md-12">

                    <div class="row">
                        <div  class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
                            <label style="margin: 10px 0px 0px 0px" align="right">ชนิดเลือด</label>
                        </div>
                        <div  class="form-group col-md-3" style="margin: 0px 0px 0px 0px">
                            <select id="findbloodstocktype3" class="form-control form-control-sm findbloodstocktype3" name="findbloodstocktype3">
                                <option value=""></option>
                                <?php
                                $strSQL = "SELECT  * FROM bloodstock_type ORDER BY bloodstocksort";
                                $objQuery = mysql_query($strSQL);
                                while ($objResuut = mysql_fetch_array($objQuery)) {
                                ?>
                                    <option  value="<?php echo $objResuut['bloodstocktypeid']; ?>">
                                        <?php echo $objResuut['bloodstocktypename2']."|".$objResuut['bloodstocktypecode']. "|" . $objResuut['bloodstocktypecodegroup']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div  class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
                            <label style="margin: 10px 0px 0px 0px" align="right">หมายเลขถุง</label>
                        </div>
                        <div  class="form-group col-md-2" style="margin: 0px 0px 0px 0px">
                            <input type="text" autocomplete="off" name="findbagnumber3" style="margin: 0px 0px 0px 0px" class="form-control" id="findbagnumber3" onkeyup="bagNumberScan(`findbagnumber3`)" >
                        </div>

                    </div>
                    <hr/>

                    <div class="row vertical-bottom">
                        <div class="col-md-6 padding-top-top15">
                            รายละเอียดการคืนเลือด
                        </div>

                    </div>
                    
                    <div class="table-no-scroll" >
                        <table id="list_table_return_blood" style="width:1000px">
                            <thead>
                                <tr>
                                    <th class="td-table" rowspan="2" style="width:60px">Print</th>
                                    <th class="td-table" rowspan="2" style="width:40px">CK</th>
                                    <th class="td-table" rowspan="2" style="width:60px">No.</th>
                                    <th class="td-table" rowspan="2" style="width:160px">วันที่คืน</th>
                                    <th class="td-table" rowspan="2" style="width:100px">เวลาที่คืน</th>
                                    <th class="td-table" rowspan="2" style="width:160px">หมายเลขถุง</th>
                                    <th class="td-table" rowspan="2" style="width:80px">ชนิดเลือด</th>
                                    <th class="td-table" rowspan="2" style="width:60px">จำนวน</th>
                                    <th class="td-table" rowspan="2" style="width:100px">CC</th>
                                    <th class="td-table" colspan="2" style="width:160px">ลักษณะของเลือด</th>
                                    <th class="td-table" rowspan="2" style="width:160px">สถานะการคืน</th>
                                </tr>
                                <tr>
                                    <th class="td-table" style="width:80px">warm</th>
                                    <th class="td-table" style="width:80px">ไม่warm</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="form-group col-md-12">
                            <i style="color: #FF66B2;" class="fa fa-circle"></i>&nbsp;คีย์แล้ว
                            <i style="color: #66FF66;" class="fa fa-circle"></i>&nbsp;รับคืนแล้ว&nbsp;&nbsp;
                            <i style="color: #FFFF66;" class="fa fa-circle"></i>&nbsp;ยังไม่ได้คืน&nbsp;&nbsp;
                            <i style="color: #A0A0A0;" class="fa fa-circle"></i>&nbsp;ธนาคารเลือดไม่รับคืน&nbsp;&nbsp;


                        </div>
                </div>

            </div><!-- end card-->
        </div>
    </div>
</div>