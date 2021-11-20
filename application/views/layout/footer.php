<footer class="footer"> ©2021 Universitas Diponegoro
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- <script src="<?= base_url('assets/main/plugins/jquery/dist/jquery.min.js');?>"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/main/plugins/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?= base_url('assets/main/js/app-style-switcher.js');?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('assets/main/js/waves.js');?>"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('assets/main/js/sidebarmenu.js');?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="<?= base_url('assets/main/plugins/chartist-js/dist/chartist.min.js');?>"></script>
    <script src="<?= base_url('assets/main/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js');?>"></script>
    <!--c3 JavaScript -->
    <script src="<?= base_url('assets/main/plugins/d3/d3.min.js');?>"></script>
    <script src="<?= base_url('assets/main/plugins/c3-master/c3.min.js');?>"></script>
    <script src="<?= base_url('assets/main/vendor/bootstrap-4.1/popper.min.js');?>"></script>
    <script src="<?= base_url('assets/main/vendor/bootstrap-4.1/bootstrap.min.js');?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets/main/js/pages/dashboards/dashboard1.js');?>"></script>
    <script src="<?= base_url('assets/main/js/custom.js');?>"></script>
    <script src="<?= base_url('assets/searchable/chosen.jquery.js');?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/searchable/docsupport/prism.js');?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?= base_url('assets/searchable/docsupport/init.js');?>" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
    
    <script>
    $(document).ready(function() {
    $('#dataTable').DataTable();
    } );
    </script>
    <?php if(!empty($chart)){ ?>
    <script>
                    $(function () {
                    "use strict";

                    // ============================================================== 
                    // Sales overview
                    // ==============================================================
                    var chart2 = new Chartist.Bar('.chart', {
                        labels: ['FEB', 'FH', 'FIB', 'FISIP', 'FK', 'FKM', 'SPS', 'FPIK', 'FPP', 'FP', 'FSM', 'SV', 'FT'],
                        series: [
                            [<?= $chart[0]->jumlah ?>, <?= $chart[1]->jumlah ?>, <?= $chart[2]->jumlah ?>, <?= $chart[3]->jumlah ?>, <?= $chart[4]->jumlah ?>, <?= $chart[5]->jumlah ?>, <?= $chart[6]->jumlah ?>, <?= $chart[7]->jumlah ?>, <?= $chart[8]->jumlah ?>, <?= $chart[9]->jumlah ?>, <?= $chart[10]->jumlah ?>, <?= $chart[11]->jumlah ?>, <?= $chart[12]->jumlah ?>]
                          ]
                    }, {
                        axisX: {
                            // On the x-axis start means top and end means bottom
                            position: 'end',
                            showGrid: false
                        },
                        axisY: {
                            // On the y-axis start means left and end means right
                            position: 'start'
                        },
                        low: '0',
                        plugins: [
                            Chartist.plugins.tooltip()
                        ]
                    });

                    var chart = [chart2];

                    // ============================================================== 
                    // This is for the animation
                    // ==============================================================

                    for (var i = 0; i < chart.length; i++) {
                        chart[i].on('draw', function (data) {
                            if (data.type === 'line' || data.type === 'area') {
                                data.element.animate({
                                    d: {
                                        begin: 500 * data.index,
                                        dur: 500,
                                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                        to: data.path.clone().stringify(),
                                        easing: Chartist.Svg.Easing.easeInOutElastic
                                    }
                                });
                            }
                            if (data.type === 'bar') {
                                data.element.animate({
                                    y2: {
                                        dur: 500,
                                        from: data.y1,
                                        to: data.y2,
                                        easing: Chartist.Svg.Easing.easeInOutElastic
                                    },
                                    opacity: {
                                        dur: 500,
                                        from: 0,
                                        to: 1,
                                        easing: Chartist.Svg.Easing.easeInOutElastic
                                    }
                                });
                            }
                        });
                    }

                    // ============================================================== 
                    // Our visitor
                    // ============================================================== 

                    var chart = c3.generate({
                        bindto: '#visitor',
                        data: {
                            columns: [
                                ['Other', 30],
                                ['Desktop', 10],
                                ['Tablet', 40],
                                ['Mobile', 50],
                            ],

                            type: 'donut',
                            onclick: function (d, i) { console.log("onclick", d, i); },
                            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                            onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                        },
                        donut: {
                            label: {
                                show: false
                            },
                            title: "Our visitor",
                            width: 20,

                        },

                        legend: {
                            hide: true
                            //or hide: 'data1'
                            //or hide: ['data1', 'data2']
                        },
                        color: {
                            pattern: ['#eceff1', '#745af2', '#26c6da', '#1e88e5']
                        }
                    });

                });
                </script>
                <?php } ?>
</body>

</html>