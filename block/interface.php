<?php include("../libs/counter.php");?>
<?php //include("libs/fetch_data.php");?>
<!-- Custom Fonts -->
<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- Custom CSS -->
<link href="../css/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- /.row -->
            <div class="row">
            <br>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-plus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  countrecords("posada");?></div>
                                    <div><strong>Посад</strong></div>
                                </div>
                            </div>
                        </div>
                        <a href="../view/posada.php">
                            <div class="panel-footer">
                                <span class="pull-left">Докладніше</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  countRecordsWhere("zajava","TIP_ZAJAVA_ID","2");?></div>
                                    <div><strong>Пошук спеціаліста</strong></div>
                                </div>
                            </div>
                        </div>
                        <a href="vacans.php">
                            <div class="panel-footer">
                                <span class="pull-left">Докладніше</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-wrench  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  countRecordsWhere("zajava","TIP_ZAJAVA_ID","1");?></div>
                                    <div><strong>Робочі місця</strong></div>
                                </div>
                            </div>
                        </div>
                        <a href="pm.php">
                            <div class="panel-footer">
                                <span class="pull-left">Докладніше</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumbs-o-up fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "12"?></div>
                                    <div><strong>На узгодженні</strong></div>
                                </div>
                            </div>
                        </div>
                        <a href="home.php">
                            <div class="panel-footer">
                                <span class="pull-left">Докладніше</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
<!--            
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-briefcase fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  rentcollected("payments");?></div>
                                    <div><strong>Rent Collected (Ksh)</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-database fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  getbalances("payments");?></div>
                                    <div><strong>All Balances (Ksh)</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-warning fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  havingbalance("payments");?></div>
                                    <div><strong>Having Balance</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  vaccanthouses("houses");?></div>
                                    <div><strong>Vaccant Houses</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
-->
            <!-- /.row -->
    <!-- Custom Theme JavaScript -->
    
    <script src="../js/dist/js/sb-admin-2.js"></script>
    